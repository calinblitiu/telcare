
# Doctor Backend

## signup_doctor

### url : http://your-domail/signup_doctor

### post : type,fname,lname,spec,email,state,lang,dea,npi,pwd,img

### result :

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


## login_doctor

### url : http://your-domail/login_doctor

### post : email , pwd

### result :

        - success:
             {
                "success" : 1,
                "error" : "...",
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
                "data" : "...."
            }
            
## Log out Doctor

### url : http://your-domain/logout_doctor

### post : token


# Patient Backend


## signup_patient

### url : http://your-domain/signup_patient

### post : fname, lname, dod, ssn, addr, email, pwd, gender, img

### result :
        
        - success :
            {
                "success" : 1,
                "error" : "Signup succesed!",
                "data" :
                 {
                    "token" : "3434r5234524352452"
                 }

            }
        - error :
            {
                "success" : 0,
                "error" : "signup is error"
                "data" => "signup is error"
            }


## login_patient

### url : http://your-domain/login_patient

### post : email, pwd

### result :
        
        - success:
        
        {
            "success" : 1,
            "error" : "login success",
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
            "error" : "There is not user",    //"Password is invalid."
            "data" : "There is not user"      //"Password is invalid"
        }
        
## Log out patient

### url : http://your-domain/logout_patient

### post : token

## Get On Call Doctor

### url : http://your-domain/get_on_call_doctor

### result 

        - success
        {
            "success":1,
            "data" : 
            {
                "img":"http:\/\/localhost\/assets\/uploads\/doctor\/150264736415625990944442f93.jpg"    // "http:\/\/localhost\/assets\/uploads\/doctor\/no-img.png"
             }
        }
        
        - error
        {
            "success" : 0,
            "error"   : "There is not on call doctor"
        }

## Upload History Attach

### url : http://your-domain/upload_history_attach

### post : token, attach

### result

        - success
        {
            "success" : 1;
            "data" :
            {
                "img" : "150264736415625990944442f93.jpg"
            }
        }
        
        - error : 
        {
            "success" : 0,
            "error" : "Upload faile"
        }

## Set Schedule

### url : http://your-domain/set_schedule

### post : token, date, note, history

### result :

        - success
        {
            "success" : 1,
            "error" : "Add new schedule success",
            "data" : "Add new schedule success"
        }
        
        - error
        {
            "success" : 1,
            "error" : "Add new schedule error",
            "data" : "Add new schedule error"
        }

# Common Backend

## Forget Password

### url : http://you-domain/forget_password

### post : email, user_type

### result : 
        
        - success
        {
            "success" : 1,
            "message" : "mail sent success, please check your email"
        }
        
        - error
        {
            "success" : 0,
            "message" : "There is not register email"
        }
