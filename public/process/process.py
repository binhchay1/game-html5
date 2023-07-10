import time
import json
from selenium import webdriver
from selenium.webdriver.common.desired_capabilities import DesiredCapabilities
from selenium.webdriver.chrome.service import Service
from selenium.common.exceptions import UnexpectedAlertPresentException
from selenium.webdriver.chrome.options import Options

service = Service(executable_path='C:\Program Files\Chrome Driver\chromedriver.exe')
options = Options()
options.headless = True
driver = webdriver.Chrome(service=service, options=options)
listItems = []
i = 0

file = open("process.txt")

for line in file.readlines():
    driver.get(line)
    time.sleep(10)
    data = driver.execute_script("return window.performance.getEntriesByType('resource');")
    listItems.append([])
    data.append([line])
    listItems[i].append(data)
    i+=1

print(json.dumps(listItems))
