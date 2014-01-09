from django.db import models


class Index_state(models.Model):
   
    state_index = models.IntegerField(max_length=64,primary_key=True)
    state_name = models.CharField(max_length=64)
    def __unicode__(self):
        return u"%s - %s"%(self.key,self.text)

class Index_locality(models.Model):
   
    locality_index = models.IntegerField(max_length=64,primary_key=True)
    locality_name = models.CharField(max_length=64)
    state_index  = models.ForeignKey(Index_state)
    def __unicode__(self):
        return u"%s - %s"%(self.key,self.text)

class Index_school(models.Model):  
    school_index = models.IntegerField(max_length=64,primary_key=True)
    school_name = models.CharField(max_length=64)
    locality_index  = models.ForeignKey(Index_locality)
    def __unicode__(self):
        return u"%s - %s"%(self.key,self.text)


class warehouse(models.Model):

    warehouse_MsgID = models.AutoField(primary_key=True,max_length=64)
    warehouse_smsType = models.TextField(max_length=64,null=True)
    warehouse_state = models.ForeignKey(Index_state)
    warehouse_quality = models.IntegerField(max_length=64,null=True)
    warehouse_MsgTime = models.DateField(auto_now_add=True,null=True)
    warehouse_ArvTime = models.DateField(null=True)

    
    def __unicode__(self):
         return u"%s - %s"%(self.warehouse_ArvTime,self.warehouse_MsgTime,self.warehouse_SmsTime,self.warehouse_warehouse,self.key)


class warehouseTypes(models.Model):
    warehouseTypes_Type = models.TextField(max_length=64,null=True)
    warehouseTypes_quantity = models.IntegerField(max_length=64,null=True)
    warehouseTypes_msgId = models.ForeignKey(warehouse)



    def __unicode__(self):

        return u"%s - %s"%(self.warehouseTypes_Type,self.warehouseTypes_quality,self.warehouseTypes_quantity,self.key)


class state(models.Model):
    

    state_MsgID = models.AutoField(primary_key=True,max_length=64)
    state_smsType = models.TextField(max_length=64,null=True)
    state_state =  models.ForeignKey(Index_state)
    state_locality = models.ForeignKey(Index_locality)
    state_quality = models.IntegerField(max_length=64,null=True)
    state_ArvTime = models.DateField(null=True)
    state_MsgTime = models.DateField(auto_now_add=True)


    def __unicode__(self):
        return u"%s - %s"%(self.state_ArvTime,self.state_MsgTime,self.state_SmsTime,self.state_locality,self.state_state,self.key)

class stateTypes(models.Model):

    stateTypes_Type = models.TextField(max_length=64,null=True)
    stateTypes_quantity = models.IntegerField(max_length=64,null=True)
    stateTypes_msgId = models.ForeignKey(state)



    def __unicode__(self):
        return u"%s - %s"%(self.stateTypes_Type,self.stateTypes_quality,self.stateTypes_quantity,self.key)

class locality(models.Model):


    locality_MsgID = models.AutoField(primary_key=True,max_length=64)
    locality_smsType = models.TextField(max_length=64,null=True)
    locality_state = models.ForeignKey(Index_state)
    locality_locality = models.ForeignKey(Index_locality)
    locality_school = models.ForeignKey(Index_school)
    locality_quality = models.IntegerField(max_length=64,null=True)
    locality_ArvTime = models.DateField(null=True)
    locality_MsgTime = models.DateField(auto_now_add=True)


    def __unicode__(self):
        return u"%s - %s"%(self.locality_ArvTime,self.locality_MsgTime,self.locality_SmsTime,self.locality_locality,self.locality_state,self.key)



class localityTypes(models.Model):

    localityTypes_Type = models.TextField(max_length=64,null=True)
    localityTypes_quantity = models.IntegerField(max_length=64)
    localityTypes_msgId = models.ForeignKey(locality)



    def __unicode__(self):

        return u"%s - %s"%(self.localityTypes_Type,self.localityTypes_quantity,self.key)



class school(models.Model):

    school_MsgID = models.AutoField(primary_key=True,max_length=64)
    school_smsType = models.TextField(max_length=64,null=True)
    school_locality = models.ForeignKey(Index_locality)
    school_school = models.ForeignKey(Index_school)   
    school_quality = models.IntegerField(max_length=64,null=True)
    school_ArvTime = models.DateTimeField(null=True)
    school_MsgTime = models.DateField(auto_now_add=True)

    def __unicode__(self):

        return u"%s - %s"%(self.school_ArvTime,self.school_MsgTime,self.school_SmsTime,self.school_warehouse,self.key)


class schoolTypes(models.Model):

    schoolTypes_Type = models.TextField(max_length=64,null=True)
    schoolTypes_quantity = models.IntegerField(max_length=64,null=True)
    schoolTypes_msgId = models.ForeignKey(school)



    def __unicode__(self):

        return u"%s - %s"%(self.schoolTypes_Type,self.schoolTypes_quantity,self.key)








