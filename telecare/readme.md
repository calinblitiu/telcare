
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

## Get My Patients

### url : http://your-domain/get_my_patients

### post : token

### result : 
        
        - success
        {
            "success" : 1,
            "data" : [
                {
                    "fname" : "james",
                    "lname" : "smith",
                    "gender" : "0",
                    "dob" : "2017-08-16",
                    "ssn" : "234",
                    "addr" : "aa",
                    "email" : "james.smith.rb@outlook.com",
                    "img" : "http:\/\/localhost\/assets\/uploads\/patients\/15027755099989599288d549e85.jpg",
                    "note" : "......",
                    "history" : [
                        "http://your-domain/assets/uploads/schedule/aa.jpg",
                        "http://your-domain/assets/uploads/schedule/aa.jpg"
                    ]
                },
                {
                    "fname" : "pplkhj",
                    "lname" : "fhjnvff",
                    "gender" : "0",
                    "dob" : "1990-01-22",
                    "ssn" : "22222222",
                    "addr" : "yyyhh",
                    "email" : "ff@ff.ff",
                    "img" : "http:\/\/localhost\/assets\/uploads\/patients\/1502998104281705995ee583f922.png",
                    "note" : "......",
                    "history" : [
                        "http://your-domain/assets/uploads/schedule/aa.jpg",
                        "http://your-domain/assets/uploads/schedule/aa.jpg"
                    ]
                }
            ]
        }
        
        -error
        {
            "success" : 0,
            "error": "There is not patients"
        }
        
## Get New Patients

### url : http://your-domain/get_new_patients

### post : token

### result :

        - success
        {
            "success" : 1,
            "data" : [
                {
                    "fname" : "pplkhj",
                    "lname" : "fhjnvff",
                    "gender" : "0",
                    "dob" : "1990-01-22",
                    "ssn" : "22222222",
                    "addr" : "yyyhh",
                    "email" : "ff@ff.ff",
                    "img" : "http:\/\/localhost\/assets\/uploads\/patient\/1502998104281705995ee583f922.png",
                    "note" : "......",
                    "history" : [
                        "http://your-domain/assets/uploads/schedule/aa.jpg",
                        "http://your-domain/assets/uploads/schedule/aa.jpg"
                    ]
                 },
                 {
                    "fname" : "z",
                    "lname" : "we",
                    "gender" : "0",
                    "dob" : "0000-00-00",
                    "ssn" : "45",
                    "addr" : "dgg",
                    "email" : "ayg@f.com",
                    "img" : "http:\/\/localhost\/assets\/uploads\/patient\/1503110077278655997a3bdb0692.jpg",
                    "note" : "......",
                    "history" : [
                        "http://your-domain/assets/uploads/schedule/aa.jpg",
                        "http://your-domain/assets/uploads/schedule/aa.jpg"
                    ]
                 }
            ]
        }
        
        - error
        {
            "success" : 0,
            "error" : "There is no new patients"
        }
        
## Accept/Decline Patient

### url : http://your-domain/accept_patient, http://your-domain/decline_patient

### post : token , email

### result :
    
         - success :
         {
            "success" : 1,
            "error" : "Patient is accepted"  // "Patient is declined"
         }
         
         - error : 
         {
            "success" : 0,
            "error" : "Patient is already accepted"  // "Patient is already declined 
         }

## Get Today Schedule

### url : http://your-domain/get_today_schedule

### post : token

### result :
        
        - success :
        {
            "success":1,
            "error":"There is some schedule",
            "data":[
                {
                    "pid":"13",
                    "img":"1502998104281705995ee583f922.png",
                    "fname":"pplkhj",
                    "lname":"fhjnvff",
                    "gender":"0",
                    "dob":"1990-01-22",
                    "ssn":"22222222",
                    "addr":"yyyhh",
                    "email":"ff@ff.ff"
                },
                {
                    "pid":"24",
                    "img":"15031969081915998f6ec26276.jpg",
                    "fname":"g",
                    "lname":"gg",
                    "gender":"0",
                    "dob":"0000-00-00",
                    "ssn":"66",
                    "addr":"sf",
                    "email":"l@h.com"
                }
            ]
        }
        
        - error
        {
            "success" : 0,
            "error" : "There is not today Schedule"
        }
        
## Req Call

### url : http://your-domain/req_call_doctor

### post : token , email (patient email), is_call(0 : calling, 1 : receiver)

### result : 

        - success
        {
            "success":1,
            "data":{
                "opentok_session_id":"2_MX40NTkyNzc0Mn5-MTUwMzM1MDIyNTg1Mn5RRmRFT2VRbHR0S3c4Q2g1NXZENXFBNHN-UH4",
                "opentok_token":"T1==cGFydG5lcl9pZD00NTkyNzc0MiZzaWc9MjdlYjU1OTA3NjcwMzg4N2E1MTA4ZGQzYzE1NjcyMjJjMTg2YWM3ODpzZXNzaW9uX2lkPTJfTVg0ME5Ua3lOemMwTW41LU1UVXdNek0xTURJeU5UZzFNbjVSUm1SRlQyVlJiSFIwUzNjNFEyZzFOWFpFTlhGQk5ITi1VSDQmY3JlYXRlX3RpbWU9MTUwMzM1MDIxOSZyb2xlPXB1Ymxpc2hlciZub25jZT0xNTAzMzUwMjE5LjA2MzIxMTMxMDkxMDM="
            }
        }
        
        - error
        {
            "success" : 0,
            "error" : "This patient doesn't request call now"
        }
        
## Check out

### url : http://your-domain/b_check_out

### post : token, stripeToken, amount

### result :
        
        - success : 
        {
            "success" : 1,
            "data" : "payement successed"
        }
        
        - error
        {
            "success" : 0,
            "error" : "Payment happens error"
        }

# Patient Backend


## signup_patient

### url : http://your-domain/signup_patient

### post : fname, lname, dob, ssn, addr, email, pwd, gender, img

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
                    "dob":"22/4/1992",
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

### post : token, img

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
            "error" : "Upload failed"
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
            "success" : 0,
            "error" : "Add new schedule error",
            "data" : "Add new schedule error"
        }
        
## Set Schedule IOS

### url : http://your-domain/set_schedule_ios

### post : token, date, note, attach_count, img_0, img_2,....img_(attach_count-1)

### result :

        - success
        {
            "success" : 1,
            "error" : "Add new schedule success",
            "data" : "Add new schedule success"
        }
        
        - error
        {
            "success" : 0,
            "error" : "There is not any attachments, please upload some files"
        }

## Get Id Doctor

### url : http://your-domail/get_id_doctor

### post : token

### result :

        - success 
        {
            "success" : 1,
            "data" :
            {
                "fname" : "james",
                "lname" : "smith",
                "spec" : "0",
                "email" : "james.smith.rb@outlook.com",
                "img" : "http:\/\/localhost\/assets\/uploads\/doctor\/1502989926146835995ce6673430.png",
                "lang" : "0",
                "dea" : "aa",
                "npi" : "123"
            }
        }
        
        - error
        {
            "success" : 0,
            "error" : "You are not alloced to any Doctor"  // "This doctor is remove in database."
        }

## Request Call 

### url : http://your-domain/req_call

### post : token, is_call(0 : calling, 1 : receiver)

### result 

        - success
        {
            "success" : 1,
            "data" :
            {
                "opentok_session_id" : "21313421...",
                "opentok_token" : "asdfhqehou....."
            }
        }
        
        - error
        {
            "success" : 0,
            "error" : "You have not schedule,please add new schedule" // "You are not alloced to any Doctor", "Opentok Session creation is failed!", "Opentok session is not added to database"
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

## Get All Id Doctors

### url : http://your-domain/get_id_doctors

### result :

        - success
        {
            "success" : 1,
            "data" : [
                {
                    "fname" : "james",
                    "lname" : "smith",
                    "spec" : "0",
                    "email" : "james.smith.rb@outlook.com",
                    "img" : "http:\/\/localhost\/assets\/uploads\/doctor\/1502989926146835995ce6673430.png",
                    "lang" : "0",
                    "dea" : "aa",
                    "npi" : "123"
                 },
                {
                    "fname" : "gaedong",
                    "lname" : "shoe",
                    "spec" : "0",
                    "email" : "gaedongshoe@gmail.com",
                    "img" : "http:\/\/localhost\/assets\/uploads\/doctor\/no-img.png",
                    "lang" : "0",
                    "dea" : "aa",
                    "npi" : "11"
                }
            ]
        }
        
        - error
        {
            "success" : 0,
            "error" : "There is not any id"
        }