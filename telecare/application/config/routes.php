<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
//$route['default_controller'] = 'home';
$route['default_controller'] = 'mokup';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

////////////////////////////////////////////////////////////////////////////
////////////////////     FRONT END /////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////


/*
 * Doctor
 */
$route['f-signup-doctor'] = "home/signUpDoctor";
$route['f-login-doctor'] = "home/loginDoctor";

/*
 * Patient
 */
    $route['f-signup-patient'] = "home/signUpPatient";
$route['f-login-patient'] = "home/loginPatient";
$route['f-set-schedule'] = "frontend/patient/patient/setSchedule";
$route['f_check_out'] = "mokup/checkOut";

/*
 * mokup
 */
$route['patient_portal'] = "mokup/patientPortal";
$route['provider_portal'] = "mokup/providerPortal";
$route['provider_infectious'] = "mokup/providerInfectiouse";
$route['provider_refering'] = "mokup/providerRefering";
$route['provider_registeration'] = "mokup/providerRegisteration";
$route['provider_refering_physician_singup'] = "mokup/referingPhysicianSignup";
$route['hospital'] = "mokup/hospital";
$route['login'] = "mokup/login";
$route['signup'] = "mokup/signUp";
$route['services'] = "mokup/services";
$route['service_consultorsecondopinion'] = "mokup/consultOrSecondOpinion";
$route['service_eopat'] = "mokup/eoPAT";
$route['service_patient_education'] = "mokup/patientEducation";
$route['service_start_to_finish'] = "mokup/startToFinish";
$route['contact_us'] = "mokup/contactUS";
$route['video_audio_messaging'] = "mokup/videoAudioMessaging";
$route['footer_directory'] = "mokup/directory";
$route['footer_about'] = "mokup/about";
$route['dashboard'] = "mokup/dashboard";
$route['patient_dashboard'] = "mokup/patientDashboard";
$route['privacy_policy'] = "mokup/privacyPolicy";
$route['terms_and_condition'] = "mokup/termsAndCondition";
$route['accounts_page'] = "mokup/accountsPage";
$route['pusher_test'] = "mokup/pusherTest";
$route['send_nodification'] = "mokup/sendNotification";




////////////////////////////////////////////////////////////////////////////
////////////////////     Back  END /////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////

/* 
* Doctor
*/

$route['signup_doctor'] = "backend/doctor/doctor/signUp";
$route['login_doctor'] = "backend/doctor/doctor/logIn";
$route['logout_doctor'] = "backend/doctor/doctor/logOut";

$route['get_on_call_doctor'] = "backend/doctor/doctor/getOnCallDoctor";
$route['get_my_patients'] = "backend/doctor/DoctorAfterLogin/getMyPatients";
$route['get_new_patients'] = "backend/doctor/doctorafterlogin/getNewPatients";
$route['accept_patient'] = "backend/doctor/doctorafterlogin/acceptPatient/yes";
$route['decline_patient'] = "backend/doctor/doctorafterlogin/acceptPatient/no";
$route['get_today_schedule'] = "backend/doctor/doctorafterlogin/getTodaySchedule";
$route['req_call_doctor'] = "backend/doctor/doctorafterlogin/reqCall";

/*
 * Patient
 */

$route['signup_patient'] = 'backend/patient/patient/signUp';
$route['login_patient'] = "backend/patient/patient/logIn";
$route['logout_patient'] = "backend/patient/patient/logOut";
$route['set_schedule'] = "backend/patient/patientafterlogin/setSchedule";
$route['set_schedule_ios'] = "backend/patient/patientafterlogin/setScheduleIOS";
$route['upload_history_attach'] = "backend/patient/patientafterlogin/uploadHistoryAttach";
$route['get_id_doctor'] = "backend/patient/patientafterlogin/getIdDoctor";
$route['req_call'] = "backend/patient/patientafterlogin/reqCall";
$route['b_check_out'] = "backend/patient/patientafterlogin/checkOut";

/*
 * common
 */
//frontend
$route['f_forget_password'] = "";
$route['f_reset_passsword/(:num)/(:any)'] = "home/f_resetPassword/$1/$2";


//backend
$route['forget_password'] = "home/forgetPassword";
$route['get_id_doctors'] = "home/getAllIdDoctors";
//$route['creat_new_opentok_session'] = "home/createNewOpentokSession1";