from django.conf.urls.defaults import *



urlpatterns = patterns('SKD_Release1.apps.SKD_app.views',

  url(r'^home$','home',name="SKD_app_home"),
   url(r'^Message_log$','Message_log',name="SKD_app_Message_log"),
    url(r'^State_Report$','State_Report',name="SKD_app_State_Report"),
    url(r'^Locality_Report$','Locality_Report',name="SKD_app_Locality_Report"),    
    url(r'^School_Report$','School_Report',name="SKD_app_School_Report"),
)
