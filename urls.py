from django.conf.urls.defaults import *
from django.conf import settings
from django.contrib import admin
from SKD_Release1 import settings

admin.autodiscover()

urlpatterns = patterns('',
    # Example:
    # (r'^my-project/', include('my_project.foo.urls')),

    # Uncomment the admin/doc line below to enable admin documentation:
    # (r'^admin/doc/', include('django.contrib.admindocs.urls')),

    (r'^admin/', include(admin.site.urls)),
    
    # RapidSMS core URLs
    (r'^account/', include('rapidsms.urls.login_logout')),
 url(r'^$', 'SKD_Release1.apps.SKD_app.views.home', name='rapidsms-dashboard'),

    # RapidSMS contrib app URLs
    (r'^ajax/', include('rapidsms.contrib.ajax.urls')),
    (r'^export/', include('rapidsms.contrib.export.urls')),
    (r'^SKD_app/', include('SKD_Release1.apps.SKD_app.urls')),

)

if settings.DEBUG:
    urlpatterns += patterns('',
        # helper URLs file that automatically serves the 'static' folder in
        # INSTALLED_APPS via the Django static media server (NOT for use in
        # production)
        (r'^', include('rapidsms.urls.static_media')),
    )
