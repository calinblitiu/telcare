##############
Doctor Backend
##############

*************
signup_doctor
*************
url : http://your-domail/signup_doctor

post : type,fname,lname,spec,email,state,lang,dea,npi,pwd,img

result :
        - success:
            {
                "success" : 1
            }
        - error
            {
                "success" : 0,
                "error" : "signup is error"
            }

************
login_doctor
************
url : http://your-domail/login_doctor

post : email , pwd

result :
    -success :
    {
        "success" : 1,
        "data" : {
            "fname" : "rubby",
            "lname":"star",
            "spec":"0",
            "type":"2",
            "email":"rubby.star@hotmail.com",
            "state":"22",
            "lang":"0",
            "dea":"aa",
            "npi":"23",
            "img":"http:\/\/127.0.0.1\/assets\/uploads\/doctor\/150264736415625990944442f93jpg"
        }
    }

    -error
    {
        "success" : 0,
        "error" : "There is not user"    //"Password is invalid."
    }

