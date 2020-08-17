from functools import wraps
import requests
from bs4 import BeautifulSoup
from time import sleep
from csv import writer, DictWriter
import ssl

pages = []

for i in range(181, 280):
    MAX_RETRIES = 20
    url = 'https://iato.in/members/view/' + str(i)
    pages.append(url)
    session = requests.Session()
    adapter = requests.adapters.HTTPAdapter(max_retries=MAX_RETRIES)
    session.mount('https://', adapter)
    session.mount('http://', adapter)
    r = session.get(url)


def sslwrap(func):
    @wraps(func)
    def bar(*args, **kw):
        kw['ssl_version'] = ssl.PROTOCOL_TLSv1
        return func(*args, **kw)
    return bar


ssl.wrap_socket = sslwrap(ssl.wrap_socket)

with open("new_iato.csv", "a+", newline="") as file:
    headers = ["company", "contact", "designation", "address",
               "city", "state", "pincode", "email", "landline", "mobile"]
    csv_writer = DictWriter(file, fieldnames=headers)
    csv_writer.writeheader()

    for content in pages:
        page = requests.get(content)
        soup = BeautifulSoup(page.text, "html.parser")
        tables = soup.find_all(class_="post-content")

        for row in tables[3:]:
            tr = row.find_all("p")
            for cell in tr:
                if cell.b:
                    cell.b.extract()
            csv_writer.writerow({
                "company": tr[0].get_text(),
                "contact": tr[1].get_text(),
                "designation": tr[2].get_text(),
                "address": tr[3].get_text(),
                "city": tr[4].get_text(),
                "state": tr[5].get_text(),
                "pincode": tr[6].get_text(),
                "email": tr[7].get_text(),
                "landline": tr[8].get_text(),
                "mobile": tr[9].get_text()
            })
            # sleep(1)
