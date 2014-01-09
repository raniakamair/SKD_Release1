from django.http import HttpResponse, Http404, HttpResponseRedirect
from django.shortcuts import render_to_response, get_object_or_404
from django.core.urlresolvers import reverse
from django.views.decorators.csrf import csrf_protect
from django.template import RequestContext
from django.contrib.auth.decorators import login_required


@csrf_protect
def home(request):
    return render_to_response("SKD_app/home.html", {}, context_instance=RequestContext(request) )


@login_required(login_url='/account/login/')
@csrf_protect
def Message_log(request):
    return render_to_response("SKD_app/Message_log.php", {}, context_instance=RequestContext(request) )

@login_required(login_url='/account/login/')
@csrf_protect
def State_Report(request):
    return render_to_response("SKD_app/State_Report.php", {}, context_instance=RequestContext(request) )

@login_required(login_url='/account/login/')
@csrf_protect
def Locality_Report(request):
    return render_to_response("SKD_app/Locality_Report.php",  {}, context_instance=RequestContext(request) )

@login_required(login_url='/account/login/')
@csrf_protect
def School_Report(request):
    return render_to_response("SKD_app/School_Report.php",  {}, context_instance=RequestContext(request) )



