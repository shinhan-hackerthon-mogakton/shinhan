import requests
import datetime
import json
import random
import time
import urllib3
import aiohttp
import asyncio
headers = {
    'Content-Type': "application/json",
    'User-Agent': "PostmanRuntime/7.19.0",
    'Accept': "*/*",
    'Cache-Control': "no-cache",
    'Postman-Token': "5e5f8bcb-ab90-4147-a9b7-318fd54bcbb5,69ec804d-7f2a-4f53-a303-87aaa9321ddf",
    'Host': "10.3.17.61:8082",
    'Accept-Encoding': "gzip, deflate",
    'Content-Length': "104",
    'Connection': "keep-alive",
    'cache-control': "no-cache"
    }


async def add(i):
    async with aiohttp.ClientSession(connector=aiohttp.TCPConnector(verify_ssl=False)) as session:
        if i == 0:
            payload = "{\r\"dataHeader\":\r{\r},\r\"dataBody\":\r{\r \"serviceCode\":\"D2600\",\r \"거래일련번호\":\"233023\",\r \"클라이언트_거래번호\":\"0510134537\",\r \"입금계좌메모\":\"\",\r \"출금계좌메모\":\"\",\r}\r}"
            async with session.post('http://10.3.17.61:8080/v1/transfer/krw', headers=headers, data=payload) as resp:
                print(await resp.text())
        if i == 1:
            payload = "{\r\"dataHeader\":\r{\r},\r\"dataBody\":\r{\r \"serviceCode\":\"D7131\",\r \"출금계좌번호\":\"110210568827\",\r \"통화코드\":\"USD\",\r \"원화금액\":\"0\",\r “외화금액”:”100”,\r “입금계좌번호”:”110-054-682917”\r}\r}"
            async with session.post('http://10.3.17.61:8080/v1/transfer/foreign-stock', headers=headers, data=payload) as resp:
                print(await resp.text())
        if i == 2:
            payload = "{\r\"dataHeader\":\r{\r},\r\"dataBody\":\r{\r \"serviceCode\":\"D2004\",\r \"출금은행구분\":\"1\",\r \"출금계좌번호\":\"110-184-647880\",\r \"비밀번호체크유무\":\"1\"\r}\r}"
            async with session.post('http://10.3.17.61:8080/v1/transfer/v2/stocks/balance-check', headers=headers, data=payload) as resp:
                print(await resp.text())
        if i == 3:
            payload = "{\r\"dataHeader\":\r{\r},\r\"dataBody\":\r{\r\"serviceCode\":\"D1110\",\r\"정렬구분\":\"1\",\r\"조회시작일\":\"2019.09.20\",\r\"조회종료일\":\"2019.09.27\",\r\"계좌번호\":\"110-294-129071\"\r}\r}"
            async with session.post('http://10.3.17.61:8080/v1/search/transaction/history', headers=headers, data=payload) as resp:
                print(await resp.text())
        if i == 4:
            payload = "{\r\"dataHeader\":\r{\r},\r\"dataBody\":\r{\r \"serviceCode\":\"T2002\"\r}\r}"
            async with session.post('http://10.3.17.61:8080/v1/search/bankcode', headers=headers, data=payload) as resp:
                print(await resp.text())
        if i == 5:
            payload = "{\r\"dataHeader\":\r{},\r\"dataBody\" :\r{\r    \"serviceCode\":\"D2400\",\r    \"입금은행코드\":\"027\",\r    \"입금계좌번호\":\"1550000525001\",\r    \"입금계좌입력방식\":\"01\",\r    \"이체금액\":10000,\r    \"출금은행구분\":\"1\",\r    \"출금계좌번호\":\"110276312351\",\r    \"출금계좌비밀번호\":\"16089950761435%2FENC%2Fl8oM1k%2BzKM7aFtzBzME4dw%3D%3D%0A\",\r    \"합계_이체금액\":10000,\r    \"이체업무구분\":\"01\",\r    \"CMS코드\":\"\",\r    \"입금계좌메모\":\"\",\r    \"출금계좌메모\":\"\",\r    \"버전\":\"\"\r}\r}"
            async with session.post('http://10.3.17.61:8080/v1/search/realname', headers=headers, data=payload) as resp:
                print(await resp.text())
        if i == 6:
            payload = "{\r\"dataHeader\":\r{},\r\"dataBody\":\r{\r \"serviceCode\":\"C2010\",\r \"거래구분\":\"9\",\r \"계좌감추기여부\":\"1\",\r \"보안계좌조회구분\":\"2\",\r \"주민등록번호\":\"WmokLBDCO9/yfihlYoJFyg==\"\r}\r}"
            async with session.post('http://10.3.17.61:8080/v1/account/list', headers=headers, data=payload) as resp:
                print(await resp.text())
        if i == 7:
            payload = "{\r\"dataHeader\":\r{\r},\r\"dataBody\":\r{\r \"serviceCode\":\"D1130\",\r \"정렬구분\":\"1\",\r \"조회시작일\":\"20190228\",\r \"조회종료일\":\"20190830\",\r \"조회기간구분\":\"1\",\r \"은행구분\":\"1\",\r \"계좌번호\":\"230221966424\"\r}\r}"
            async with session.post('http://10.3.17.61:8080/v1/account/deposit/detail', headers=headers, data=payload) as resp:
                print(await resp.text())
        if i == 8:
            payload = "{\r\"dataHeader\":\r{\r},\r\"dataBody\":\r{\r \"업무구분\":\"01\",\r \"고객번호\":\"0741831215\",\r \"은행구분\":\"1\",\r \"계좌번호\":\"110180148200\",\r \"조회기간구분\":\"1\",\r \"조회시작일\":\"20190925\",\r \"조회종료일\":\"20190925\",\r \"정렬구분\":\"1\",\r}\r}"
            async with session.post('http://10.3.17.61:8080/v1/account/loan/detail', headers=headers, data=payload) as resp:
                print(await resp.text())
        if i == 9:
            payload = "{\r\"dataHeader\":\r{\r},\r\"dataBody\":\r{\r \"계좌번호\":\"180008366918\",\r \"은행구분\":\"1\",\r \"고객번호\":\"0792221595\",\r \"통화코드\":\"JPY\",\r \"거래점용은행구분\":\"1\",\r \"입력업무구분\":\"01\"\r}\r}"
            async with session.post('http://10.3.17.61:8080/v1/account/foreign-stock/detail', headers=headers, data=payload) as resp:
                print(await resp.text())
        if i == 10:
            payload = "{\r\"dataHeader\":\r{\r},\r\"dataBody\":\r{\r \"거래구분\":\"1\",\r \"계좌번호\":\"250132675998\",\r \"은행구분\":\"1\",\r \"미기장거래\":\"1\",\r \"직원조회\":\"1\",\r \"정렬구분\":\"2\"\r}\r}"
            async with session.post('http://10.3.17.61:8080/v1/account/fund/detail', headers=headers, data=payload) as resp:
                print(await resp.text())

        if i == 11:
            payload = "{\r\"dataHeader\":\r{\r},\r\"dataBody\":\r{\r\"고객번호\":\"0741831215\",\r\"업무구분\":\"01\",\r\"조회구분\":\"00\",\r\"계좌번호\":\"269000015682\",\r\"시작일자\":\"20190826\",\r\"종료일자\":\"20190926\",\r\"거래유형\":\"99\",\r\"조회건수\":\"00000\"\r}\r}"
            async with session.post('http://10.3.17.61:8080/v1/account/investment-trust/detail', headers=headers, data=payload) as resp:
                print(await resp.text())

        if i == 12:
            payload = "{\r\"dataHeader\":\r{\r},\r\"dataBody\":\r{\r\"공통부\":\"\",\r\"고객구분\":\"1\",\r\"주민번호\":\"8710231505621\",\r\"고객번호\":\"0791656581\",\r\"관계구분\":\"00\",\r\"FILLER\":\"\",\r\"보험사코드\":\"\",\r\"증권번호\":\"\",\r\"초과여부\":\"\",\r\"필러\":\"\"\r}\r}"
            async with session.post('http://10.3.17.61:8080/v1/account/isa/detail', headers=headers, data=payload) as resp:
                print(await resp.text())

        if i == 13:
            payload = "{\r\"dataHeader\":\r{\r},\r\"dataBody\":\r{\r  \"serviceCode\":\"T0731\",\r  \"연동거래정보\":\"/Yqu0KRktzwFOQn2Yv//k254smViUMSf/0Z+z9XMIOFl8cv4OS3ZQHRIHufe61jEqLJNsOANugmvpVGpRwGdjg==\",\r  \"주택소재지코드\":\"04513\",\r  \"보증금액\":\"500\",\r  \"연소득\":\"600\"\r}\r}"
            async with session.post('http://10.3.17.61:8080/v1/account/bancassurance/detail', headers=headers, data=payload) as resp:
                print(await resp.text())
        if i == 14:
            payload = "{\r\"dataHeader\":\r{\r},\r\"dataBody\":\r{\r \"serviceCode\":\"D2073\",\r \"입금계좌번호\":\"5602019741\",\r \"기관전문전송시간\":\"20190905175031\",\r \"앱코드\":\"040001\",\r \"입금은행코드\":\"035\",\r \"기관전문관리번호\":\"128307200\",\r \"이체금액\":\"1\"\r}\r}"
            async with session.post('http://10.3.17.61:8080/v1/account/bancassurance/detail', headers=headers, data=payload) as resp:
                print(await resp.text())
        if i == 15:
            payload = "{\r\"dataHeader\":\r{\r},\r\"dataBody\":\r{\r\"통화코드\":\"USD\",\r\"serviceCode\":\"F3750\",\r\"고시일자041\":\"20190618\",\r\"고시일자042\":\"20190625\"\r}\r}"
            async with session.post('http://10.3.17.61:8080/v1/account/v1/houselease/creditline', headers=headers, data=payload) as resp:
                print(await resp.text())
        if i == 16:
            payload = "{\r\"dataHeader\":\r{\r},\r\"dataBody\":\r{\r \"serviceCode\":\"F3730\",\r \"조회일자\":\"20160809\",\r \"고시회차\":\"0\"\r}\r}"
            async with session.post('http://10.3.17.61:8080/v1/auth/1wontransfer', headers=headers, data=payload) as resp:
                print(await resp.text())
        if i == 17:
            payload = "{\r\"dataHeader\":\r{\r},\r\"dataBody\":\r{\r\"serviceCode\":\"E4307\",\r\"검색어\":\"미아\"\r}\r}"
            async with session.post('http://10.3.17.61:8080/v1/search/realtime-fx/period', headers=headers, data=payload) as resp:
                print(await resp.text())
        if i == 18:
            payload = "{\r\"dataHeader\":\r{\r},\r\"dataBody\":\r{\r\"serviceCode\":\"T0507\",\r\"지역코드\":\"906\"\r}\r}"
            async with session.post('http://10.3.17.61:8080/v1/search/realtime-fx/count', headers=headers, data=payload) as resp:
                print(await resp.text())
        if i == 19:
            payload = "{\r\"dataHeader\":\r{\r},\r\"dataBody\": \r{\r  \t\"upche_mcht_no\":\"000000000001\",\r  \t\"sol_tramt\":\"318870\",\r  \t\"trx_time\":\"101917\",\r  \t\"pos_no\":\"1000000001\",\r  \t\"qr_no\":\"AW00|12753261|0000001636|20191001101905654127|RIB001BFE0A5EA03\",\r  \t\"upche_id\":\"AW00\",\r  \t\"trxdt\":\"20191001\",\r  \t\"serviceCode\":\"T0740\",\r  \t\"sol_mcht_no\":\"880000000011\",\r  \t\"upche_trxno\":\"180-389873908-101527\",\r  \t\"trx_g\":\"02\",\r  \t\"jehyu_id\":\"12753261\"\r}\r}"
            async with session.post('http://10.3.17.61:8080/v1/search/branch-category/keyword', headers=headers, data=payload) as resp:
                print(await resp.text())
        if i == 20:
            payload = payload = "{\r\"dataHeader\":\r{\r},\r\"dataBody\":\r{\r \"serviceCode\":\"D7131\",\r \"출금계좌번호\":\"110210568827\",\r \"통화코드\":\"USD\",\r \"원화금액\":\"0\",\r “외화금액”:”100”,\r “입금계좌번호”:”110-054-682917”\r}\r}"
            async with session.post('http://10.3.17.61:8080/v1/search/branch-category/city', headers=headers, data=payload) as resp:
                print(await resp.text())
        if i == 21:
            payload = payload = "{\r\"dataHeader\":\r{\r},\r\"dataBody\":\r{\r \"serviceCode\":\"D7131\",\r \"출금계좌번호\":\"110210568827\",\r \"통화코드\":\"USD\",\r \"원화금액\":\"0\",\r “외화금액”:”100”,\r “입금계좌번호”:”110-054-682917”\r}\r}"
            async with session.post('http://10.3.17.61:8080/v1/solpay/qr-payment', headers=headers, data=payload) as resp:
                print(await resp.text())
        if i == 22:
            payload = payload = "{\r\"dataHeader\":\r{\r},\r\"dataBody\":\r{\r \"serviceCode\":\"D7131\",\r \"출금계좌번호\":\"110210568827\",\r \"통화코드\":\"USD\",\r \"원화금액\":\"0\",\r “외화금액”:”100”,\r “입금계좌번호”:”110-054-682917”\r}\r}"
            async with session.post('http://10.3.17.61:8080/v1/search/realtime-fx/period', headers=headers, data=payload) as resp:
                print(await resp.text())


headers = {
    'Content-Type': 'application/json',
    'Accept': 'application/json',
}

tasks = []
loop = asyncio.get_event_loop()
for i in range (23):
    task = asyncio.ensure_future(add(i))
    tasks.append(task)
loop.run_until_complete(asyncio.wait(tasks))