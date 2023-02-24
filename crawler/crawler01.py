# thư viện
import requests
from bs4 import BeautifulSoup
import json

# sử dụng Request để lấy được dữ liệu trả về phương thức GET
tomtat = requests.get("https://www.ncbi.nlm.nih.gov/research/pubtator-api/publications/export/biocjson?pmids=36232774&concepts=breast,cancer/")
chitiet = requests.get("https://www.ncbi.nlm.nih.gov/research/pubtator-api/publications/export/biocjson?pmcids=PMC9570294&concepts=breast,cancer")

#phân tích dữ liệu HTML, XML
soup1 = BeautifulSoup(tomtat.text, "html.parser")
soup2 = BeautifulSoup(chitiet.text, "html.parser")
# bóc tách data
html1 = soup1.text
html2 = soup2.text

# print(html1)
# ghi dữ liệu về json
with open('test.json', 'w') as outfile:
    json.dump(html1, outfile)

json_string = json.dumps(html2)
with open('test2.json', 'w') as file:
    file.write(json_string)
    


