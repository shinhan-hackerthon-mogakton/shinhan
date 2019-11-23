import requests
import json
import datetime
import json
import time

list1_URI = [
    '/v1/transfer/krw',
    '/v1/transfer/foreign-stock',
    '/v2/stocks/balance-check',
    '/v1/search/transaction/history',
    '/v1/search/bankcode',
    '/v1/search/realname',
    '/v1/account/list',
    '/v1/account/deposit/detail',
    '/v1/account/loan/detail',
    '/v1/account/foreign-stock/detail',
    '/v1/account/fund/detail',
    '/v1/account/investment-trust/detail',
    '/v1/account/isa/detail',
    '/v1/account/bancassurance/detail',
    '/v1/houselease/creditline',
    '/v1/auth/1wontransfer',
    '/v1/search/realtime-fx/period',
    '/v1/search/realtime-fx/count',
    '/v1/search/branch-category/keyword',
    '/v1/search/branch-category/city',
    '/v1/solpay/qr-payment'
]

list2_URI = [
    '/v1/applycard/transfernamefromkortoeng',
    '/v1/phoneservices/requestandverifyauthorizationforfree',
    '/v1/applycard/newaddress',
    '/v1/account/ownerforfree',
    '/v1/applycard/certificate',
    '/v1/applycard/countrycode',
    '/v1/applycard/bankcode',
    '/v1/applycard/cardproductinfo',
    '/v1/applycard/customerinfoapplycard',
    '/v1/applycard/agreement',
    '/v1/authorizations/visaansimclickcardforapplycard',
    '/v1/applycard/kcbrealnameauthorizations',
    '/v1/applycard/internetcarddeliverypossibility',
    '/v1/authorizations/visaansimclickcardforfree',
    '/v1/applycard/request1wonconfirmation',
    '/v1/applycard/check1wonresult',
    '/v1/applycard/internetsimpleevaluationexceptexternalevl',
    '/v1/mycard/searchavailablecard',
    '/v1/usecard/searchtotalpayments',
    '/v1/usecard/searchpaymentsdetail',
    '/v1/usecard/searchlimit',
    '/v1/usecard/searchpoint',
    '/v1/usecard/searchpointdetail',
    '/v1/usecreditcard/searchmonthlybillingfor6months',
    '/v1/usecreditcard/searchmonthlybillingdetail',
    '/v1/usecreditcard/searchusefordomestic',
    '/v1/usecreditcard/searchuseforoverseas',
    '/v1/usedebitcard/searchusefordomestic',
    '/v1/usedebitcard/searchuseforoverseas',
    '/v1/useinstallment/searchpaymentsdetail',
    '/v1/useshortloan/searchusedetail'
]

list3_URI = [
    '/v1/stock/trdprc',
    '/v1/stock/trdprc-trend',
    '/v1/stock/chart',
    '/v1/stock/jisu',
    '/v1/stock/order',
    '/v1/stock/remq',
    '/v1/stock/concstbd/search',
    '/v1/stock/concstbd/regi',
    '/v1/stock/search',
    '/v1/stock/cntrlist',
    '/v1/info/newslist',
    '/v1/info/newsdtl',
    '/v1/info/trendlist',
    '/v1/info/topickeyword',
    '/v1/info/topicnewslist',
    '/v1/info/topicnewsdtl',
    '/v1/asst/status',
    '/v1/asst/acct',
    '/v1/loan/status',
    '/v1/loan/stbdlist',
    '/v1/loan/apply',
    '/v1/fstock/simple/stbdlist',
    '/v1/fstock/simple/status',
    '/v1/fstock/simple/newslist',
    '/v1/fstock/simple/exrt',
    '/v1/fstock/simple/orderlist',
    '/v1/fstock/simple/curr',
    '/v1/fstock/simple/ord',
    '/v1/fstock/simple/cntr',
    '/v1/fstock/trdprc',
    '/v1/fstock/trdprc-trend',
    '/v1/fstock/chart',
    '/v1/fstock/ord',
    '/v1/fstock/aplc-exrt',
    '/v1/fstock/cmbn-mrgn',
    '/v1/fstock/remq',
    '/v1/fstock/cntr',
    '/v1/fstock/search'
]

list4_URI = [
    '/v1/contract/list',
    '/v1/contract/detail',
    '/v1/contract/rider',
    '/v1/contract/coverage',
    '/v1/contract/reserved-amount',
    '/v1/contract/reserved-amount-by-channel',
    '/v1/contract/partial-withdrawal-by-channel',
    '/v1/contract/dividends-by-channel',
    '/v1/contract/maturity-repayment-by-channel',
    '/v1/contract/partial-claimamount-by-channel',
    '/v1/contract/transaction',
    '/v1/contract/transaction/detail',
    '/v1/contract/premium-history',
    '/v1/contract/account-owner',
    '/v1/contract/premium',
    '/v1/contract/premium/additional-search',
    '/v1/contract/premium/additional-payment',
    '/v1/contract/variables',
    '/v1/contract/variables/reserved-amount',
    '/v1/contract/variables/roi-ratio',
    '/v1/claim/history',
    '/v1/claim/history/detail',
    '/v1/claim/history/going-hospital',
    '/v1/claim/status',
    '/v1/claim/request-status',
    '/v1/claim/status-history',
    '/v1/claim/history/indemnity',
    '/v1/loan/total-amount',
    '/v1/loan/list',
    '/v1/pension/un-received',
    '/v1/loan/payment',
    '/v1/loan/customer',
    '/v1/loan/3rd-business-day',
    '/v1/loan/instant-account',
    '/v1/common/customer-confirmation'
]

data_1    = ['{\r"dataHeader":\r{\r},\r"dataBody":\r{\r "serviceCode":"D2600",\r "거래일련번호":"233023",\r "클라이언트_거래번호":"0510134537",\r "입금계좌메모":"",\r "출금계좌메모":"",\r}\r}{\r"dataHeader":\r{\r},\r"dataBody":\r{\r "serviceCode":"D2600",\r "거래일련번호":"233023",\r "클라이언트_거래번호":"0510134537",\r "입금계좌메모":"",\r "출금계좌메모":"",\r}\r}',
           '{\r\"dataHeader\":\r{\r},\r\"dataBody\":\r{\r \"serviceCode\":\"D7131\",\r \"출금계좌번호\":\"110210568827\",\r \"통화코드\":\"USD\",\r \"원화금액\":\"0\",\r “외화금액”:”100”,\r “입금계좌번호”:”110-054-682917”\r}\r}',
           '{\r\"dataHeader\":\r{\r},\r\"dataBody\":\r{\r \"serviceCode\":\"D2004\",\r \"출금은행구분\":\"1\",\r \"출금계좌번호\":\"110-184-647880\",\r \"비밀번호체크유무\":\"1\"\r}\r}',
           '{\r\"dataHeader\":\r{\r},\r\"dataBody\":\r{\r\"serviceCode\":\"D1110\",\r\"정렬구분\":\"1\",\r\"조회시작일\":\"2019.09.20\",\r\"조회종료일\":\"2019.09.27\",\r\"계좌번호\":\"110-294-129071\"\r}\r}',
           '{\r\"dataHeader\":\r{\r},\r\"dataBody\":\r{\r \"serviceCode\":\"T2002\"\r}\r}',
           '{\r\"dataHeader\":\r{},\r\"dataBody\" :\r{\r    \"serviceCode\":\"D2400\",\r    \"입금은행코드\":\"027\",\r    \"입금계좌번호\":\"1550000525001\",\r    \"입금계좌입력방식\":\"01\",\r    \"이체금액\":10000,\r    \"출금은행구분\":\"1\",\r    \"출금계좌번호\":\"110276312351\",\r    \"출금계좌비밀번호\":\"16089950761435%2FENC%2Fl8oM1k%2BzKM7aFtzBzME4dw%3D%3D%0A\",\r    \"합계_이체금액\":10000,\r    \"이체업무구분\":\"01\",\r    \"CMS코드\":\"\",\r    \"입금계좌메모\":\"\",\r    \"출금계좌메모\":\"\",\r    \"버전\":\"\"\r}\r}',
           '{\r\"dataHeader\":\r{},\r\"dataBody\":\r{\r \"serviceCode\":\"C2010\",\r \"거래구분\":\"9\",\r \"계좌감추기여부\":\"1\",\r \"보안계좌조회구분\":\"2\",\r \"주민등록번호\":\"WmokLBDCO9/yfihlYoJFyg==\"\r}\r}',
           '{\r\"dataHeader\":\r{\r},\r\"dataBody\":\r{\r \"serviceCode\":\"D1130\",\r \"정렬구분\":\"1\",\r \"조회시작일\":\"20190228\",\r \"조회종료일\":\"20190830\",\r \"조회기간구분\":\"1\",\r \"은행구분\":\"1\",\r \"계좌번호\":\"230221966424\"\r}\r}',
           '{\r\"dataHeader\":\r{\r},\r\"dataBody\":\r{\r \"업무구분\":\"01\",\r \"고객번호\":\"0741831215\",\r \"은행구분\":\"1\",\r \"계좌번호\":\"110180148200\",\r \"조회기간구분\":\"1\",\r \"조회시작일\":\"20190925\",\r \"조회종료일\":\"20190925\",\r \"정렬구분\":\"1\",\r}\r}',
           '{\r\"dataHeader\":\r{\r},\r\"dataBody\":\r{\r \"계좌번호\":\"180008366918\",\r \"은행구분\":\"1\",\r \"고객번호\":\"0792221595\",\r \"통화코드\":\"JPY\",\r \"거래점용은행구분\":\"1\",\r \"입력업무구분\":\"01\"\r}\r}',
           '{\r\"dataHeader\":\r{\r},\r\"dataBody\":\r{\r \"거래구분\":\"1\",\r \"계좌번호\":\"250132675998\",\r \"은행구분\":\"1\",\r \"미기장거래\":\"1\",\r \"직원조회\":\"1\",\r \"정렬구분\":\"2\"\r}\r}',
           '{\r\"dataHeader\":\r{\r},\r\"dataBody\":\r{\r \"고객번호\":\"0642423512\",\r \"거래구분\":\"1\",\r \"은행구분\":\"1\",\r \"계좌번호\":\"299011373321\", \r \"직원여부\":\"1\",\r \"정렬구분\":\"1\",\r}\r}',
           '{\r\"dataHeader\":\r{\r},\r\"dataBody\":\r{\r\"고객번호\":\"0741831215\",\r\"업무구분\":\"01\",\r\"조회구분\":\"00\",\r\"계좌번호\":\"269000015682\",\r\"시작일자\":\"20190826\",\r\"종료일자\":\"20190926\",\r\"거래유형\":\"99\",\r\"조회건수\":\"00000\"\r}\r}',
           '{\r\"dataHeader\":\r{\r},\r\"dataBody\":\r{\r\"공통부\":\"\",\r\"고객구분\":\"1\",\r\"주민번호\":\"8710231505621\",\r\"고객번호\":\"0791656581\",\r\"관계구분\":\"00\",\r\"FILLER\":\"\",\r\"보험사코드\":\"\",\r\"증권번호\":\"\",\r\"초과여부\":\"\",\r\"필러\":\"\"\r}\r}',
           '{\r\"dataHeader\":\r{\r},\r\"dataBody\":\r{\r  \"serviceCode\":\"T0731\",\r  \"연동거래정보\":\"/Yqu0KRktzwFOQn2Yv//k254smViUMSf/0Z+z9XMIOFl8cv4OS3ZQHRIHufe61jEqLJNsOANugmvpVGpRwGdjg==\",\r  \"주택소재지코드\":\"04513\",\r  \"보증금액\":\"500\",\r  \"연소득\":\"600\"\r}\r}',
           '{\r\"dataHeader\":\r{\r},\r\"dataBody\":\r{\r \"serviceCode\":\"D2073\",\r \"입금계좌번호\":\"5602019741\",\r \"기관전문전송시간\":\"20190905175031\",\r \"앱코드\":\"040001\",\r \"입금은행코드\":\"035\",\r \"기관전문관리번호\":\"128307200\",\r \"이체금액\":\"1\"\r}\r}',
           '{\r\"dataHeader\":\r{\r},\r\"dataBody\":\r{\r\"통화코드\":\"USD\",\r\"serviceCode\":\"F3750\",\r\"고시일자041\":\"20190618\",\r\"고시일자042\":\"20190625\"\r}\r}',
           '{\r\"dataHeader\":\r{\r},\r\"dataBody\":\r{\r \"serviceCode\":\"F3730\",\r \"조회일자\":\"20160809\",\r \"고시회차\":\"0\"\r}\r}',
           '{\r\"dataHeader\":\r{\r},\r\"dataBody\":\r{\r\"serviceCode\":\"E4307\",\r\"검색어\":\"미아\"\r}\r}',
           '{\r\"dataHeader\":\r{\r},\r\"dataBody\":\r{\r\"serviceCode\":\"T0507\",\r\"지역코드\":\"906\"\r}\r}',
           '{\r\"dataHeader\":\r{\r},\r\"dataBody\": \r{\r  \t\"upche_mcht_no\":\"000000000001\",\r  \t\"sol_tramt\":\"318870\",\r  \t\"trx_time\":\"101917\",\r  \t\"pos_no\":\"1000000001\",\r  \t\"qr_no\":\"AW00|12753261|0000001636|20191001101905654127|RIB001BFE0A5EA03\",\r  \t\"upche_id\":\"AW00\",\r  \t\"trxdt\":\"20191001\",\r  \t\"serviceCode\":\"T0740\",\r  \t\"sol_mcht_no\":\"880000000011\",\r  \t\"upche_trxno\":\"180-389873908-101527\",\r  \t\"trx_g\":\"02\",\r  \t\"jehyu_id\":\"12753261\"\r}\r}'
           ]

data_2    = ["""{
	"dataHeader":{
	},
	"dataBody":{
		"clnHgNm":"파최형"
	}
}""",
             '{\r\t\"dataHeader\":{\r\t},\r\t\"dataBody\": {\r\t \"vrfyNo\":\"\",\r\t\t\t\"MsgCntt\":\"123698\",\r\t\t\t\"bizGbn\":\"02\",\r\t\t\t\"telcoTpCode\":\"1\",\r\t\t\t\"mobiNo1\":\"010\",\r\t\t\t\"mobiNo2\":\"2959\",\r\t\t\t\"mobiNo3\":\"7643\",\r\t\"encIdno\":\"2866shinhanial%2FENC%2FjxhtM0akykzdn0%2FZl7n8Pg%3D%3D%0A\"\r\r\t}\r}',
             '{\r\t\"dataHeader\":{\r\t},\r\t\"dataBody\":{\r\t\t\"nxtQyKey\":\"\",\r\t\t\t\"zipseq\":\"\",\r\t\t\t\"addr1\":\"\",\r\t\t\t\"addr2Detail\":\"\",\r\t\t\t\"waynamekey\":\"\",\r\t\t\t\"olZfn\":\"\",\r\t\t\t\"olZan\":\"\",\r\t\t\t\"zip1\":\"028\",\r\t\t\t\"zip2\":\"00\",\r\t\t\t\"fullAddr\":\"서울 성북구 월곡로 41-11 (종암동)\",\r\t\t\t\"rsdnno\":\"2\"\r\t}\r}',
             '{\r\t\"dataHeader\":{\r\t},\r\t\"dataBody\":{\r\t\t\t\r\t\t\t\"nxtQyKey\":\"\",\r\t\t\t\"backCd\":\"088\"\r\t}\r}',
             '{\r\t\"dataHeader\":{\r\t},\r\t\"dataBody\":{\r\t\t\t\r\t\t\t\"signed_data\":\"\",\r\t\"encIdno\":\"2866shinhanial%2FENC%2FjxhtM0akykzdn0%2FZl7n8Pg%3D%3D%0A\"\r\t}\r}',
             '{\r\t\"dataHeader\":{\r\t},\r\t\"dataBody\":{\r\t\t\t{\r\t}\r}',
             '{\r\t\"dataHeader\":{\r\t},\r\t\"dataBody\":{\r\t\t\t\r\t}\r}',
             '{\r\t\"dataHeader\":{\r\t},\r\t\"dataBody\":{\r\t\t\t\r\t\t\t\"crdPdN\":\"AUAARH\"\r\t}\r}',
             '{\r\t\"dataHeader\":{\r\t},\r\t\"dataBody\":{\r\t\t\t{\r\t}\r}',
             '{\r\t\"dataHeader\":{\r\t},\r\t\"dataBody\":{\r\t\t\t\r\t\t\t\"crdPdN\":\"AUAARH\"\r\t}\r}',
             '{\r\t\"dataHeader\":{\r\t},\r\t\"dataBody\":{\r\t\t\"cardNoEnc\":\r\"9986D78CABB0F61D4D0DC7C2ED1633D90B65906B4FFFA403656225BBA2050380\",\r\t\t\"passwd\":\r\"6904MDIwGhMABB%2FENC%2Fq8F%2Ftkqt09eT0IzpnGi%2B0A%3D%3D\",\r\t\t\"cvv2\":\"4132MDIwGhMABB%2FENC%2F3zAfsnPJhUoJTgDGTSS8vQ%3D%3D\",\r\t\t\"validTrm\":\"201808\"\r\t}\r}',
             '{\r\t\"dataHeader\":{\r\t},\r\t\"dataBody\":{\r\"nxtQyKey\":\"\",\"clnNm\":\"파최형\",\"encIdno\":\"7961shinhanial%2FENC%2FjxhtM0akykzdn0%2FZl7n8Pg%3D%3D%0A\"\r}\r}',
             '{\r\t\"dataHeader\":{\r\t},\r\t\"dataBody\":{\r\"nxtQyKey\":\"\",\"zipcode\":\"02800\",\"encIdno\": \"7961shinhanial%2FENC%2FjxhtM0akykzdn0%2FZl7n8Pg%3D%3D%0A\"}\r}',
             '{\r\t\"dataHeader\":{\r\t},\r\t\"dataBody\":{\r\"cardNoEnc\":\r\"9986D78CABB0F61D4D0DC7C2ED1633D90B65906B4FFFA403656225BBA2050380\",\r\t\t\"passwd\":\r\"6904MDIwGhMABB%2FENC%2Fq8F%2Ftkqt09eT0IzpnGi%2B0A%3D%3D\",\r\t\t\"cvv2\":\"4132MDIwGhMABB%2FENC%2F3zAfsnPJhUoJTgDGTSS8vQ%3D%3D\",\r\t\t\"validTrm\":\"201808\",\r\"encIdno\":\"3847shinhanial%2FENC%2FjxhtM0akykzdn0%2FZl7n8Pg%3D%3D%0A\"\r}\r}',
             '{\r\t\"dataHeader\":{\r\t},\r\t\"dataBody\":{\r\"rqUqeN\":\"\",\"clnNm\":\"구주오\",\"encIdno\":\"3847shinhanial%2FENC%2FjxhtM0akykzdn0%2FZl7n8Pg%3D%3D%0A\",\"rqBcd\":\"088\",\"rqAtn\":\"100001534581\",\"ctsPtTcd\":\"01\",\"soCtsN\":\"\",\"psUcd\":\"\",\"psRuTt\":\"\"\r}\r}',
             '{\r\t\"dataHeader\":{\r\t},\r\t\"dataBody\":{\r\"rqUqeN\":\"\",\"clnNm\":\"구주오\",\"encIdno\":\"3847shinhanial%2FENC%2FjxhtM0akykzdn0%2FZl7n8Pg%3D%3D%0A\",\"rqBcd\":\"088\",\"rqAtn\":\"100001534581\",\"ctsPtTcd\":\"01\",\"soCtsN\":\"\",\"psUcd\":\"\",\"psRuTt\":\"\"\r}\r}',
             '{\r\t\"dataHeader\":{\r\t},\r\t\"dataBody\":{\r\"nxtQyKey\":\"\",\"encIdno\":\"6583shinhanial%2FENC%2Fs%2FX0ghHodWoKCd44M%2BJGIg%3D%3D%0A\",\"hName\":\"강정공\",\"sRsdn\":\"\",\"sName\":\"\", \"jobCd\":\"100\",\"houseType\":\"1\",\"crdtMemberType\":\"\",\"checkMemberType\":\"\",\"revcntrablefg\":\"\",\"evltNqryRgCd\":\"3\",\"rgKId\":\"\",\"mchtOwnYn\":\"\",\"cardBuGb\":\"\",\"iPthGubun\":\"\",\"secYn\":\"\",\"jehyuNm\":\"\",\"sstf\":\"\",\"bodyfiller\":\"\",\"chlc\":\"MOB\"\r\t}\r}',
             '{\r\t\"dataHeader\":{\r\t},\r\t\"dataBody\":{\r\t\t\"nxtQyKey\":\"\"\r\t}\r}',
             '{\r\t\"dataHeader\":{\r\t},\r\t\"dataBody\":{\r\t\t\"nxtQyKey\":\"\"\r\t}\r}',
             '{\r\t\"dataHeader\":{\r\t},\r\t\"dataBody\":{\r\t\t\"nxtQyKey\":\"\",\r\t\t\"setlTypeNo\":\"0002\",\r\t\t\"setlDay\":\"20190820\"\r\t}\r}',
             '{\r\t\"dataHeader\":{\r\t},\r\t\"dataBody\":\r{\"nxtQyKey\":\"\",\"encIdno\":\"6583shinhanial%2FENC%2Fs%2FX0ghHodWoKCd44M%2BJGIg%3D%3D%0A\",\"hName\":\"강정공\"\t}\r}',
             '{\r\t\"dataHeader\":{\r\t},\r\t\"dataBody\":{\r\t\t\"nxtQyKey\":\"\",\r\t\t\"querydt\":\"20190701\"\r\t}\r}',
             '{\r\t\"dataHeader\":{\r\t},\r\t\"dataBody\":{\r\t\t\"nxtQyKey\":\"\",\r\t\t\"nqryD\":\"20190701\",\r\"pntTpCd\":\"L01\"\r\t}\r}',
             '{\r\t\"dataHeader\":{\r\t},\r\t\"dataBody\":{\r\t\t\"nxtQyKey\":\"\",\r\t\t\"smonth\":\"06\",\r\"setlTypeNo\":\"0002\"\r\t}\r}',
             '{\r\t\"dataHeader\":{\r\t},\r\t\"dataBody\":{\r\t\t\"nxtQyKey\":\"\",\r\t\t\"setlDay\":\"20190722\",\r\"setlTypeNo\":\"0002\"\r\t}\r}',
             '{\r\t\"dataHeader\":{\r\t},\r\t\"dataBody\":{\r\t\t\"nxtQyKey\":\"\",\r\t\t\"inqterm\":\"2019050720190805\",\r\"bctag\":\"0\"\r\t}\r}',
             '{\r\t\"dataHeader\":{\r\t},\r\t\"dataBody\":{\r\t\t\"nxtQyKey\":\"\",\r\t\t\"fromdate\":\"20190506\",\r\t\t\"todate\":\"20190806\",\r\"bctag\":\"0\",\r\"fmlOCrdC\":\"0\"\r\t}\r}',
             '{\r\t\"dataHeader\":{\r\t},\r\t\"dataBody\":{\r\t\t\"nxtQyKey\":\"\",\r\"bctag\":\"0\",\r\"inqterm\":\"2019050720190805\"\r\t}\r}',
             '{\r\t\"dataHeader\":{\r\t},\r\t\"dataBody\":{\r\t\t\"nxtQyKey\":\"\",\r\"fromdate\":\"20190507\",\r\"todate\":\"20190830\",\r\"bctag\":\"0\"\r\t}\r}',
             '{\r\t\"dataHeader\":{\r\t},\r\t\"dataBody\":{\r\t\t\"nxtQyKey\":\"\",\r\"setlTypeNo\":\"9990\",\r\"setlDay\":\"20190820\"\r\t}\r}',
             '{\r\t\"dataHeader\":{\r\t},\r\t\"dataBody\":{\r\t\t\"nxtQyKey\":\"\",\r\"queryStartDt\":\"20190520\",\r\"queryEndDt\":\"20190820\"\r\t}\r}'

             ]

data_3 = [
        '{\r  \"dataHeader\" : {\r    \r  },\r  \"dataBody\" : {\r    \"code\" : \"055550\"\r  }\r}',
        '{\r  \"dataHeader\" : {\r    \r  },\r  \"dataBody\" : {\r    \"code\" : \"055550\"\r  }\r}',
        '{\r  \"dataHeader\" : {\r  \r  },\r  \"dataBody\" : {\r    \"code\" : \"000660\",\r    \"chart_gubun\" : \"D\",\r    \"time_cls\" : \"001\",\r    \"qry_strt_ymd\" : \"20170901\",\r    \"qry_end_ymd\" : \"20170911\",\r    \"rows\" : \"99\",\r    \"repeatKey\" : \"\"\r  }\r}',
        '{\r  \"dataHeader\" : {\r   \r  },\r  \"dataBody\" : { }\r}',
        '{\r  \"dataHeader\" : {    \r  \r},\r  \"dataBody\" : {\r    \"acct_no\" : \"01234567890\",\r    \"acct_gds_code\" : \"01\",\r    \"acct_pwd\" : \"4400shinhanial%2FENC%2FPp831ci50Of3DpcOqy5ghA%3D%3D\",\r    \"acct_mang_dbrn_code\" : \"\",\r    \"mrkt_tp_code\" : \"\",\r    \"futr_repl_tp_code\" : \"0\",\r    \"crd_deal_tp_code\" : \"00\",\r    \"sell_buy_tp_code\" : \"2\",\r    \"stbd_code\" : \"A066570\",\r    \"ord_qty\" : \"1\",\r    \"ord_uv\" : \"80100\",\r    \"regul_tmout_tp_code\" : \"1\",\r    \"callv_type_code\" : \"2\",\r    \"ord_cond_tp_code\" : \"0\",\r    \"crd_lndo_cmbn_ord_tp_code\" : \"0\",\r    \"crd_lndo_ymd\" : \"\",\r    \"orig_ord_no\" : \"\"\r  }\r}',
        '{\r  \"dataHeader\" : {\r  \r  },\r  \"dataBody\" : {\r    \"acct_no\" : \"01234567890\",\r    \"acct_gds_code\" : \"01\",\r    \"acct_pwd\" : \"4400shinhanial%2FENC%2FPp831ci50Of3DpcOqy5ghA%3D%3D\",\r    \"qry_tp_code\" : \"1\",\r    \"uv_tp_code\" : \"1\",\r    \"stbd_tp_code\" : \"1\",\r    \"adup_tp_code\" : \"1\",\r    \"mrkt_tp_code\" : \"1\"\r  }\r}',
        '{\r  \"dataHeader\" : {\r   \r  },\r  \"dataBody\" : { }\r}',
        '{\r  \"dataHeader\" : {\r   \r  },\r  \"dataBody\" : {\r    \"conc_grp_seq\" : \"1\",\r    \"list\" : [ {\r      \"qry_seq\" : \"1\",\r      \"dom_for_tp_code\" : \"1\",\r      \"stbd_code\" : \"068400\",\r      \"stbd_nm\" : \"AJ렌터카\"\r    }, {\r      \"qry_seq\" : \"2\",\r      \"dom_for_tp_code\" : \"1\",\r      \"stbd_code\" : \"011760\",\r      \"stbd_nm\" : \"현대상사\"\r    }, {\r      \"qry_seq\" : \"2\",\r      \"dom_for_tp_code\" : \"1\",\r      \"stbd_code\" : \"055550\",\r      \"stbd_nm\" : \"신한지주\"\r    } ]\r  }\r}',
        'http://10.3.17.61:8082/v1/stock/search?category=kospi%2Ckosdaq&q=%EC%8B%A0%ED%95%9C&start=0&rows=20',
        '{\r  \"dataHeader\" : {\r   \r  },\r  \"dataBody\" : {\r    \"acct_no\" : \"01234567890\",\r    \"acct_gds_code\" : \"01\",\r    \"acct_pwd\" : \"4400shinhanial%2FENC%2FPp831ci50Of3DpcOqy5ghA%3D%3D\",\r    \"ord_ymd\" : \"20170914\",\r    \"cntr_dcd_tp_code\" : \"1\",\r    \"stbd_code\" : \"*\",\r    \"sell_buy_tp_code\" : \"0\",\r    \"stbd_tp_code\" : \"0\",\r    \"adup_tp_code\" : \"0\",\r    \"cash_crd_tp_code\" : \"0\"\r  }\r}',
        '{\r  \"dataHeader\" : {\r  \r  },\r  \"dataBody\" : {\r    \"gubun\" : \"\",\r    \"code\" : \"\",\r    \"date\" : \"\"\r  }\r}',
        '{\r  \"dataHeader\" : {\r  \r  },\r  \"dataBody\" : {\r    \"news_cls\" : \"E\",\r    \"date\" : \"20190924\",\r    \"news_seqn\" : \"00668\"\r  }\r}',
        '{\r  \"dataHeader\" : {\r\r  },\r  \"dataBody\" : {\r    \"news_cls\" : \"\",\r    \"date\" : \"\",\r    \"news_seqn\" : \"\"\r  }\r}',
        '{\r  \"dataHeader\" : {\r\r  },\r  \"dataBody\" : { }\r}',
        '{\r  \"dataHeader\" : {\r   \r  },\r  \"dataBody\" : {\r    \"toppickId\" : \"9649708\"\r  }\r}',
        '{\r  \"dataHeader\" : {\r  \r  },\r  \"dataBody\" : {\r    \"category\" : \"economy\",\r    \"newsId\" : \"551139647917527051\"\r  }\r}',
        '{\r  \"dataHeader\" : {\r    \r  },\r  \"dataBody\" : {\"cust_id\" : \"qkrejrghksdmscjswoek\" }\r}',
        '{\r  \"dataHeader\" : {\r   \r  },\r  \"dataBody\" : {\r    \"acct_no\" : \"01234567890\"\r  }\r}',
        '{\r  \"dataHeader\" : {\r    \r  },\r  \"dataBody\" : {\"cust_id\" : \"qkrejrghksdmscjswoek\" }\r}',
        '{\r  \"dataHeader\" : {\r \r },\r  \"dataBody\" : {\r    \"acct_no\" : \"01234567890\",\r    \"acct_pwd\" : \"7314MDIwGhMABB%2FENC%2FqaKe822OXedVIZQHFzyZpA%3D%3D\"\r  }\r}',
        '{\r  \"dataHeader\" : {\r    \r  },\r  \"dataBody\" : {\r    \"acct_no\" : \"01234567890\",\r    \"lndo_amt\" : \"100000\",\r    \"tel_aply_yn\" : \"N\",\r    \"acct_pwd\" : \"7314MDIwGhMABB%2FENC%2FqaKe822OXedVIZQHFzyZpA%3D%3D\"\r  }\r}',
        '{\r  \"dataHeader\" : {\r    \r  },\r  \"dataBody\" : {\r    \"gicCode\" : \"USAAAPL\"\r  }\r}',
        '{\r  \"dataHeader\" : {\r   \r  },\r  \"dataBody\" : {\r    \"gicCode\" : \"\"\r  }\r}',
        '{\r  \"dataHeader\" : {\r   \r  },\r  \"dataBody\" : {\r    \"newsType\" : \"3\",\r    \"newsNo\" : \"2108\",\r    \"newsDate\" : \"20180516\"\r  }\r}',
        '{\r  \"dataHeader\" : {\r    \r  },\r  \"dataBody\" : { }\r}',
        '{\r  \"dataHeader\" : {\r   \r  },\r  \"dataBody\" : {\r    \"resvSeq\" : \"0\",\r    \"statCode\" : \"0\",\r    \"ordYmd\" : \"20180525\"\r  }\r}',
        '{\r  \"dataHeader\" : {\r    \r  },\r  \"dataBody\" : {\r    \"currAmt\" : \"10000\",\r    \"acctPwd\" : \"0000\"\r  }\r}',
        '{\r  \"dataHeader\" : {\r    \r  },\r  \"dataBody\" : {\r    \"acctNo\" : \"27001234567\",\r    \"acctPwd\" : \"71374773999190%2FENC%2FZ6tnuZ292EXO%2B2MoGTbaXQ%3D%3D%0A\",\r    \"gicCode\" : \"USAAAPL\",\r    \"sellBuyTpCode\" : \"1\",\r    \"ordQty\" : \"10\",\r    \"ordScdlYmd\" : \"\",\r    \"resvSeq\" : \"\"\r  }\r}',
        '{\r  \"dataHeader\" : {\r    \r  },\r  \"dataBody\" : {\r    \"qryStrtYmd\" : \"20180101\",\r    \"qryEndYmd\" : \"20180102\"\r  }\r}',
        '{\r   \"dataHeader\" : {\r  },\r  \"dataBody\" : {\r    \"userid\" : \"1049738960\",\r    \"isdelayed_list\" : \"DDDDDD\",\r    \"country_code\" : \"USA\",\r    \"symbol\" : \"NVAX\",\r    \"gic\" : \"USANVAX\"\r  }\r}',
        '{\r  \"dataHeader\" : {\r  \r  },\r  \"dataBody\" : {\r    \"userid\" : \"0123456789\",\r    \"isdelayed\" : \"DDDDDD\",\r    \"country_code\" : \"USA\",\r    \"symbol\" : \"AMZN\",\r    \"gic\" : \"USAAMZN\",\r    \"trade_date\" : \"20190924\",\r    \"limit_count\" : \"60\",\r    \"time_kind\" : \"D\"\r  }\r}',
        '{\r  \"dataHeader\" : {\r   \r  },\r  \"dataBody\" : {\r    \"userid\" : \"SYSTEM\",\r    \"isdelayed_list\" : \"DDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDD\",\r    \"country_code\" : \"USA\",\r    \"symbol\" : \"GOGL\",\r    \"time_kind\" : \"D\",\r    \"interval\" : \"1\",\r    \"trade_date\" : \"00000000\",\r    \"trade_end_date\" : \"99999999\",\r    \"limit_count\" : \"0200\"\r  }\r}',
        '{\r  \"dataHeader\" : {\r \r },\r  \"dataBody\" : {\r    \"cancel_yn\" : \"N\",\r    \"acct_no\" : \"01234567890\",\r    \"acct_gds_code\" : \"01\",\r    \"acct_pwd\" : \"26841289864288%2FENC%2F%2FC9XKnWThzYY16ipYN4Rcw%3D%3D%0A\",\r    \"for_mrkt_tp_code\" : \"06\",\r    \"stbd_code\" : \"USAAAPL\",\r    \"mdfy_cncl_tp_code\" : \"0\",\r    \"orig_ord_no\" : \"\",\r    \"sell_buy_tp_code\" : \"2\",\r    \"ord_qty\" : \"1\",\r    \"ord_uv\" : \"156.83\",\r    \"callv_type_code\" : \"2\",\r    \"ord_cond_tp_code\" : \"0\",\r    \"resv_ord_tp_code\" : \"0\",\r    \"uppr_callv_proc_tp\" : \"\"\r  }\r}',
        '{\r  \"dataHeader\" : {\r   \r  },\r  \"dataBody\" : {\r    \"acct_no\" : \"01234567890\",\r    \"acct_gds_code\" : \"01\",\r    \"sim_exmny_yn\" : \"\",\r    \"acct_pwd\" : \"99374373333400%2FENC%2FFw58kEheoOhe9khVq8eRcQ%3D%3D%0A\",\r    \"sell_curr_code\" : \"KRW\",\r    \"buy_curr_code\" : \"USD\",\r    \"rlay_curr_code\" : \"\",\r    \"sell_curr_base_exmny_amt\" : \"0\",\r    \"buy_curr_base_exmny_amt\" : \"0\"\r  }\r}',
        '{\r  \"dataHeader\" : {\r \r },\r  \"dataBody\" : {\r    \"acct_no\" : \"01234567890\",\r    \"acct_pwd\" : \"7534MDIwGhMABB%2FENC%2FqaKe822OXedVIZQHFzyZpA%3D%3D\",\r    \"acct_gds_code\" : \"01\",\r    \"curr_code\" : \"USD\",\r    \"gic_code\" : \"USAAAPL\",\r    \"ord_uv\" : \"186.51\"\r  }\r}',
        '{\r  \"dataHeader\" : {\r\r  },\r  \"dataBody\" : {\r    \"acct_no\" : \"01234567890\",\r    \"acct_gds_code\" : \"\",\r    \"acct_pwd\" : \"4400shinhanial%2FENC%2FPp831ci50Of3DpcOqy5ghA%3D%3D\",\r    \"fx_clas_code\" : \"\",\r    \"natn_tp_code\" : \"\",\r    \"for_mrkt_tp_code\" : \"\",\r    \"qry_tp_code\" : \"\"\r  }\r}',
        '{\r  \"dataHeader\" : {\r\r  },\r  \"dataBody\" : {\r    \"ord_ymd\" : \"\",\r    \"acct_no\" : \"01234567890\",\r    \"acct_pwd\" : \"4400shinhanial%2FENC%2FPp831ci50Of3DpcOqy5ghA%3D%3D\",\r    \"cntr_tp_code\" : \"0\",\r    \"natn_tp_code\" : \"0\",\r    \"for_mrkt_tp_code\" : \"*\",\r    \"gic_code\" : \"\",\r    \"sumtot_tp_code\" : \"0\",\r    \"acct_gds_code\" : \"01\",\r    \"fx_clas_code\" : \"\"\r  }\r}',
        'http://10.3.17.61:8082/v1/fstock/search?q=*'

        ]

data_4 = [
    '{\r  \"dataHeader\":{\r   \r  },\r  \"dataBody\" : {\r     \"rdreNo\":\"WmokLBDCO9/yfihlYoJFyg==\"\r  }\r}',
    '{\r  \"dataHeader\":{\r   \r  },\r  \"dataBody\": {\r     \"inonNo\":\"WmokLBDCO9/yfihlYoJFyg==\"\r  }\r}',
    '{\r  \"dataHeader\":{\r   \r  },\r  \"dataBody\"{\r     \"inonNo\":\"WmokLBDCO9/yfihlYoJFyg==\"\r  }\r}',
    '{\r  \"dataHeader\":{\r   \r  },\r  \"dataBody\":{\r    \"totCn\":\"0\", \"inqrSc\":\"1\",  \"inonNo\":\"WmokLBDCO9/yfihlYoJFyg==\"\r  }\r}',
    '{\r  \"dataHeader\":{\r   \r  },\r  \"dataBody\":{\r    \"inqrScCd\":\"9\",  \"inonNo\":\"WmokLBDCO9/yfihlYoJFyg==\"\r  }\r}',
    '{\r  \"dataHeader\":{\r   \r  },\r  \"dataBody\":{\r    \"pageNo\":\"1\",\r    \"rowCn\":\"10\",\r    \"inonNo\":\"Nv9cqYmoiHE2OJgAtLPn+g==\",\r    \"inqrYmd\":\"20160912\"\r    }\r}',
    '{\r  \"dataHeader\":{\r   \r  },\r  \"dataBody\":{\r    \"rdreNo\":\"WmokLBDCO9/yfihlYoJFyg==\"\r  }\r}',
    '{\r  \"dataHeader\":{\r   \r  },\r  \"dataBody\":{\r    \"rdreNo\":\"WmokLBDCO9/yfihlYoJFyg==\"\r}\r}',
    '{\r  \"dataHeader\":{\r   \r  },\r  \"dataBody\":{\r    \"rdreNo\":\"WmokLBDCO9/yfihlYoJFyg==\"\r}}',
    '{\r  \"dataHeader\":{\r   \r  },\r  \"dataBody\":{\r    \"rdreNo\":\"WmokLBDCO9/yfihlYoJFyg==\"\r}}'
]



headers = {
    'Content-Type': "application/json; charset=utf-8",
    'User-Agent': "PostmanRuntime/7.19.0",
    'Accept': "*/*",
    'Cache-Control': "no-cache",
    'Postman-Token': "095260ef-49bd-4b02-963d-0af3372d102d,8da3f3fb-a342-48ac-b6f9-98021db95e55",
    'Host': "10.3.17.61:8080",
    'Accept-Encoding': "gzip, deflate",
    'Content-Length': "102",
    'Connection': "keep-alive",
    'cache-control': "no-cache"
    }

for i, d in enumerate(zip(list1_URI, data_1)):
    url = d[0]
    payload = d[1]
    response = requests.request("POST", "http://10.3.17.61:8080" + url, data=payload.encode('utf-8'), headers=headers)
    try:
        json_data = json.loads(response.text)
        if json_data['dataHeader']['resultMessage'] == '당첨*':
            print(response.text)
    except:
        print(response.text)


headers = {
    'Content-Type': "application/json",
    'User-Agent': "PostmanRuntime/7.19.0",
    'Accept': "*/*",
    'Cache-Control': "no-cache",
    'Postman-Token': "4e442a42-5bde-4b4a-bb01-ec30bff55873,21b998a8-508f-4a4a-b0d0-d51b94a6aee1",
    'Host': "10.3.17.61:8081",
    'Accept-Encoding': "gzip, deflate",
    'Content-Length': "64",
    'Connection': "keep-alive",
    'cache-control': "no-cache"
    }

# for i, d in enumerate(zip(list2_URI, data_2)):
for i in range(0, 31):
    url = list2_URI[i]
    payload = data_2[i]
    response = requests.request("POST", "http://10.3.17.61:8081" + url, data=payload.encode('utf-8'), headers=headers)
    try:
        json_data = json.loads(response.text)
        if json_data['dataHeader']['resultMessage'] != '당첨*':
            print(response.text)
    except:
        print(response.text + "    " + str(i))


headers = {
    'Content-Type': "application/json",
    'User-Agent': "PostmanRuntime/7.20.1",
    'Accept': "*/*",
    'Cache-Control': "no-cache",
    'Postman-Token': "4b4e5f63-df5b-42dd-bd21-9921e1db468c,4364f696-d0aa-40a8-a9e8-1b911dd9392d",
    'Host': "10.3.17.61:8082",
    'Accept-Encoding': "gzip, deflate",
    'Connection': "keep-alive",
    'cache-control': "no-cache"
    }

for i in range(0, 38):
    url = list3_URI[i]
    payload = data_3[i]
    response = requests.request("POST", "http://10.3.17.61:8082" + url, data=payload.encode('utf-8'), headers=headers)
    try:
        json_data = json.loads(response.text)
        if json_data['dataHeader']['resultMessage'] != '당첨*':
            print(response.text)
    except:
        print(response.text + "    " + str(i))

headers = {
    'Content-Type': "application/json",
    'User-Agent': "PostmanRuntime/7.20.1",
    'Accept': "*/*",
    'Cache-Control': "no-cache",
    'Postman-Token': "4b4e5f63-df5b-42dd-bd21-9921e1db468c,5980aa4b-b3ae-4e58-a5fb-a4a6e5b95adb",
    'Host': "10.3.17.61:8082",
    'Accept-Encoding': "gzip, deflate",
    'Connection': "keep-alive",
    'cache-control': "no-cache"
    }

for i in range(0, 11):
    url = list3_URI[i]
    payload = data_3[i]
    response = requests.request("POST", "http://10.3.17.61:8083" + url, data=payload.encode('utf-8'), headers=headers)
    try:
        json_data = json.loads(response.text)
        if json_data['dataHeader']['resultMessage'] != '당첨*':
            print(response.text)
    except:

        print(i)


