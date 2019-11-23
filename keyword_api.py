import requests
import json
import datetime
import json
import time
import urllib3
import mysql.connector
from mysql.connector import Error
from mysql.connector import errorcode

url = "http://10.3.17.61:8082/v1/info/topickeyword"
connection = mysql.connector.connect(host='localhost',
                                    database='shinhan',
                                    user='root',
                                    password='vhzjtmaos1')

payload = "{\n\"dataHeader\" : {\n},\n\"dataBody\" : { } }"


headers = {
    'Content-Type': "application/json",
    'User-Agent': "PostmanRuntime/7.19.0",
    'Accept': "*/*",
    'Cache-Control': "no-cache",
    'Postman-Token': "2bbbaaaf-3c67-4ce6-bb35-2394dc0b591f,c660f1df-6eaf-4a2a-b274-cf9e4f706211",
    'Host': "10.3.17.61:8082",
    'Accept-Encoding': "gzip, deflate",
    'Content-Length': "40",
    'Connection': "keep-alive",
    'cache-control': "no-cache"
    }

response = requests.request("POST", url, data=payload, headers=headers)
data = json.loads(response.text)

if data['dataHeader']['successCode'] == '0':
    url = "http://10.3.17.61:8082/v1/info/topicnewslist"
    for d in data['dataBody']['keywordList']:

        payload = '{{\n\"dataHeader\" : {{\n}},\n\"dataBody\" : {{\n\"toppickId\" : \"{}\"}}\n}}'.format(d['topicId'])
        response = requests.request("POST", url, data=payload, headers=headers)
        kd = json.loads(response.text)
        for k in kd['dataBody']['newsList']:
            print(k['publisher'])
            insert_query = """ INSERT INTO keyword_news
                                (keyword,
                                 publisher,
                                 regDate,
                                 regTime,
                                 category,
                                 title,
                                 newsID
                                 ) values (%s, %s, %s, %s, %s, %s, %s) """
            insert_tuple = (kd['dataBody']['keyword'],
                            k['publisher'],
                            k['regDate'],
                            k['regTime'],
                            k['category'],
                            k['title'],
                            k['newsID']
                            )
            print(insert_tuple)
            cursor = connection.cursor(prepared=True)
            try:
                result = cursor.execute(insert_query, insert_tuple)
                connection.commit()
            except Error:
                print(Error)
            cursor.close()
        connection.close()


