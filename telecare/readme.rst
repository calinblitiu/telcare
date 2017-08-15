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
                "success" : 1,
                "error" : "signup successed",
                "data" : "signup successed"
            }
        - error
            {
                "success" : 0,
                "error" : "signup is error",
                "data" : "signup is error"
            }

************
login_doctor
************
url : http://your-domail/login_doctor

post : email , pwd

result :
        - success:
             {
                "success" : 1,
                "data" :
                {
                    "token" : "23124554643345674532452"
                    "fname" : "rubby",
                    "lname":"star",
                    "spec":"0",
                    "type":"2",
                    "email":"rubby.star@hotmail.com",
                    "state":"22",
                    "lang":"0",
                    "dea":"aa",
                    "npi":"23",
                    "img":"http://your-domain/assets/uploads/doctor/150264736415625990944442f93jpg"
                }
             }

        - error
            {
                "success" : 0,
                "error" : "There is not user"    //"Password is invalid."
            }

###############
Patient Backend
###############

**************
signup_patient
**************
url : http://your-domain/signup_patient

post : fname, lname, dod, ssn, addr, email, pwd, gender, img

result :
        - success :
            {
                "success" : 1
            }
        - error :
            {
                "success" : 0,
                "error" : "signup is error"
            }

*************
login_patient
*************
url : http://your-domain/login_patient

post : email, pwd

result :
        - success :
        {
            "success" : 1,
            "data" :
                {
                    "token" : "23124554643345674532452"
                    "fname" : "rubby",
                    "lname":"star",
                    "gender":"1",
                    "email":"rubby.star@hotmail.com",
                    "dod":"22/4/1992",
                    "ssn":"01111",
                    "addr":"adfadf",
                    "img":"http://your-domain/assets/uploads/patient/150264736415625990944442f93jpg"
                }
        }

        - error
        {
            "success" : 0,
            "error" : "There is not user"    //"Password is invalid."
        }