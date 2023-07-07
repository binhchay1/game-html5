import time
import json
from selenium import webdriver
from selenium.webdriver.common.desired_capabilities import DesiredCapabilities
from selenium.webdriver.chrome.service import Service

service = Service(executable_path='\Chrome Driver\chromedriver.exe')
driver = webdriver.Chrome(service=service)
listItems = []
i = 0

file = open("process.txt")

for line in file.readlines():
    listItems.append([])
    driver.get(line)
    time.sleep(5)
    data = driver.execute_script("return window.performance.getEntriesByType('resource');")
    data.append([line])
    listItems[i].append(data)
    i+=1

print(json.dumps(listItems))
