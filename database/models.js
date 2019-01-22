module.exports = { 
	User:{ 
    name:{type:String,required:true},
    phonenum:{type:String,required:true},
		email:{type:String,required:true},
		usertype:{type:String,required:true},
    password:{type:String,required:true},
    institution:{type:String,required:false},
		department:{type:String,required:false},
		address:{type:String,required:false},
		country:{type:String,required:false},
    age:{type:Number,required:false},
    city:{type:String,required:false}
  },
  Study:{
    name : {type:String,required:true},
    details : {type:String,required:true},
    lab : {type:String,required:true},
    phone : {type:String,required:true},
    location : {type:String,required:true},
    compensation : {type:String,required:true},
    criteria : {type:String,required:true},
    expectations : {type:String,required:true},
    emaildateoffset : {type:String,required:true},
    emailcontent : {type:String,required:true},
    ethics : {type:Boolean,required:true},
    participant : {type:Array,required:true}
  }
};