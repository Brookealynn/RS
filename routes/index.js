var express = require('express');
var router = express.Router();

/* GET index page. */
router.get('/', function(req, res,next) {
	res.render('index', { title: 'Research Stream' });  
	// rendering file index.html, send value of title to the html  
});


//========================

/* GET createstudy page. */
router.route("/createstudy").get(function(req,res){   // rendering file index.html, send value of title to the html  

	if(!req.session.user){ 					//see if already logged in
		req.session.error = "login first"
		res.redirect("/login");				//if not redirect to /login
	}
	console.log(req.session.user.usertype)
	if(!req.session.user.usertype == "researcher"){ 					//see if researcher
		req.session.error = "you are not researcher"
		res.redirect("/home");				//if not redirect to /home
	}
	res.render("createStudy",{title:'Create Study'});
}).post(function(req,res){ 

	//get user model from global.dbHandel(in app.js)
	if(!req.session.user){ 					//see if already logged in
		req.session.error = "login first"
		res.redirect("/login");				//if not redirect to /login
	}
	console.log(req.session.user.usertype)
	if(!req.session.user.usertype == "researcher"){ 					//see if researcher
		req.session.error = "you are not researcher"
		res.redirect("/home");				//if not redirect to /home
	}
	var Study = global.dbHandel.getModel('Study');
	var uname = req.body.name;
	var udetails = req.body.details;
	var ulab = req.body.lab;
	var uphone = req.body.phonenum;
	var ulocation = req.body.location;
	var ucompensation = req.body.compensation;
	var ucriteria = req.body.criteria;
	var uexpectations = req.body.expectations;
	var uemaildateoffset = req.body.emaildateoffset;
	var uemailcontent = "basic email content";
	var uethics = false;
	var uparticipant = [];
	if (req.body.emailcontent) {
		var uemailcontent = req.body.emailcontent;
	}
	if (req.body.ethics) {
		var uethics = true;
	}
	Study.findOne({name: uname, },function(err,doc){   // same as login
		if(err){ 
			// res.send(500);
			req.session.error =  'network error！';
			console.log(err);
			res.redirect("/createstudy");
		}else if(doc && doc.email){ 

			req.session.error = 'Study exist';
			// res.send(500);
			res.redirect("/createstudy");
		}else{ 
			Study.create({ 							// create study object using this model
				name : uname,
				details : udetails,
				lab : ulab,
				phone : uphone,
				location : ulocation,
				compensation : ucompensation,
				criteria : ucriteria,
				expectations : uexpectations,
				emaildateoffset : uemaildateoffset,
				emailcontent : uemailcontent,
				ethics : uethics,
				participant : uparticipant,
			},function(err,doc){ 
				 if (err) {
												// res.send(500);
												console.log(err);
												res.redirect("/createstudy");
                    } else {
                        req.session.error = 'create success！';
												// res.send(200);
												res.redirect("/home");
                    }
                  });
		}
	});
});


//==============

//-=-=-=-=-=-=
router.route("/browse").get(function(req,res){   // rendering file index.html, send value of title to the html  
	var Study = global.dbHandel.getModel('Study'); 
	
	Study.find().toArray(function(err,doc){   //search DB with this model by using email address
		if(err){ 										//if error return to post（login.html) No.500 error
			// res.send(500);
			console.log(err);
		}else if(!doc){ 								//no doc means no user
			req.session.error = 'no Studies';
			// res.send(404);							//	return No.404 error
			doc = []
		}
		//doc contain list of json format studies
		res.render("browse",{title:'Studies'});
	});
})

router.route("/detail").post(function(req,res){
	res.render("detail",{
		name : req.body.name,
		details : req.body.details,
		lab : req.body.lab,
		phone : req.body.phonenum,
		location : req.body.location,
		compensation : req.body.compensation,
		criteria : req.body.criteria,
		expectations : req.body.expectations,
		emaildateoffset : req.body.emaildateoffset,
		emailcontent : "basic email content",
		ethics : false,
		participant : [],
	})
})
//-=-=-=-=-=-=

/* GET login page. */
router.route("/login").get(function(req,res){   // rendering file index.html, send value of title to the html  
	res.render("login",{title:'User Login'});
}).post(function(req,res){ 					   // if there exist post, doing post job
	//get User info
	 //get user model from global.dbHandel(in app.js)
	var User = global.dbHandel.getModel('User');  
	var uname = req.body.emailaddress;				//get data from post body
	User.findOne({email:uname},function(err,doc){   //search DB with this model by using email address
		if(err){ 										//if error return to post（login.html) No.500 error
			// res.send(500);
			console.log(err);
		}else if(!doc){ 								//no doc means no user
			req.session.error = 'email does not exist';
			// res.send(404);							//	return No.404 error
		  res.redirect("/login");
		}else{ 
			if(req.body.password != doc.password){ 	//if password not match return No.404 error
				req.session.error = "wrong password";
				// res.send(404);
				res.redirect("/login");
			}else{ 									//success，set this object to session.user, return success
				req.session.user = doc;
				// res.send(200);
				res.redirect("/home");
			}
		}
	});
});

/* GET register page. */
router.route("/register").get(function(req,res){    // render register.html, send value of title to the html
	res.render("register",{title:'User register'});
}).post(function(req,res){ 
	//get user model from global.dbHandel(in app.js)
	var User = global.dbHandel.getModel('User');
	var uname = req.body.name;
	var upwd = req.body.password;
	var umail = req.body.email;
	var uphone = req.body.phonenum;
	var utype = "participant";
	if (req.body.professor) {
		utype = "researcher";
	}
	User.findOne({name: uname},function(err,doc){   // same as login
		if(err){ 
			// res.send(500);
			req.session.error =  'network error！';
			console.log(err);
			res.redirect("/register");
		}else if(doc){ 
			req.session.error = 'username exist';
			// res.send(500);
			res.redirect("/register");
		}else{ 
			User.create({ 							// create user object using this model
				name: uname,
				phonenum:uphone,
				email:umail,
				usertype: utype,
				password: upwd
			},function(err,doc){ 
				 if (err) {
												// res.send(500);
												console.log(err);
												res.redirect("/register");
                    } else {
                        req.session.error = 'create success！';
												// res.send(200);
												res.redirect("/home");

                    }
                  });
		}
	});
});

/* GET home page. */
router.get("/home",function(req,res){ 
	if(!req.session.user){ 					//see if already logged in
		req.session.error = "login first"
		res.redirect("/login");				//if not redirect to /login
	}

	res.render("home",{title:'Home'});         //rendering if logged in
});

/* GET logout page. */
router.get("/logout",function(req,res){    // logout when getting /logout, remove user object in session. rdirect to /
	req.session.user = null;
	req.session.error = null;
	res.redirect("/");
});

module.exports = router;