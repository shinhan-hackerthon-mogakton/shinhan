import requests
import json
import datetime
import json
import time
import urllib3
import mysql.connector
from mysql.connector import Error
from mysql.connector import errorcode

url = "http://10.3.17.61:8082/v1/info/newslist"
connection = mysql.connector.connect(host='localhost',
                                    database='shinhan',
                                    user='root',
                                    password='vhzjtmaos1')

# 매일 정보주식뉴스목록 API 및 정보주식뉴스내용 API 호출을 통하여 mysql DB에 저장합니다.

payload = "{\n    \"dataHeader\": {},\n    \"dataBody\": {\n        \"gubun\": \"\",\n        \"code\": \"\",\n        \"date\": \"\"\n    }\n}"
headers = {
    'Content-Type': "application/json",
    'User-Agent': "PostmanRuntime/7.19.0",
    'Accept': "*/*",
    'Cache-Control': "no-cache",
    'Postman-Token': "095260ef-49bd-4b02-963d-0af3372d102d,8da3f3fb-a342-48ac-b6f9-98021db95e55",
    'Host': "10.3.17.61:8082",
    'Accept-Encoding': "gzip, deflate",
    'Content-Length': "102",
    'Connection': "keep-alive",
    'cache-control': "no-cache"
    }

response = requests.request("POST", url, data=payload, headers=headers)
data = json.loads(response.text)
if data['dataHeader']['successCode'] == '0':  # 정보주식뉴스목록을 호출합니다
    for d in data['dataBody']['list']:   # 목록에 들어있는 일련번호를 통하여 개별적으로 정보주식뉴스내용 API 호출을 하여 내용을 가져옵니다.
        url = "http://10.3.17.61:8082/v1/info/newsdtl"
        payload = "{{'dataBody': {{'date': '{}', 'news_seqn': '{}', 'news_cls': 'E'}}, 'dataHeader': {{}}}}".format(d['news_date'], d['news_no1'])
        response = requests.request("POST", url, data=payload, headers=headers)
        article_d = json.loads(response.text)
        insert_query = """ INSERT INTO stockmarket_news 
                            (news_date,
                             news_in_time,
                             news_titl,
                             news_cls,
                             news_data,
                             shrt_code,
                             commitment_bidsize,
                             news_no1
                             ) values (%s, %s, %s, %s, %s, %s, %s, %s) """

        insert_tuple = (d['news_date'],           # 일자
                        d['news_in_time'],        # 시간
                        d['news_titl'],           # 뉴스 제목
                        d['news_cls'],            # 뉴스구분
                        article_d['dataBody']['news_data'],   # 뉴스내용
                        d['commitment_bidsize'],  # 기사번호
                        d['news_no1'],            # 기사번호1
                        d['shrt_code']            # 종목코드
                        )

        # 필요한 정보들을 DB에 저장합니다
        cursor = connection.cursor(prepared=True)
        try:
            result = cursor.execute(insert_query, insert_tuple)
            connection.commit()
        except Error:
            print(Error)
        cursor.close()
    connection.close()


