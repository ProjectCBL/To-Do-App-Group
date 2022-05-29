import { Component, EventEmitter, OnInit, Output } from '@angular/core';
import { Router } from '@angular/router';
import { AppService } from 'src/app/app.service';

@Component({
	selector: 'app-login',
	templateUrl: './login.component.html',
	styleUrls: ['./login.component.css']
})
export class LoginComponent implements OnInit {

	@Output() switchToRegister = new EventEmitter();

	username:string = "";
	password:string = "";

	errorMessage:string = "";
	showError:boolean = false;

	constructor(private router:Router, private appService:AppService) { }

	ngOnInit(): void {
		localStorage.clear();
	}

	validateLogin(){

		if(this.username == '' || this.password == ''){
			this.showError = true;
			this.errorMessage = "Missing field entry...";
			return;
		}

		this.appService.validateLogin(this.username, this.password).subscribe((response:any)=>{

			if(response != null){
				localStorage.setItem("userId", response.userId);
				localStorage.setItem("username", response.userName);
				localStorage.setItem("firstname", response.firstName);
				localStorage.setItem("lastName", response.lastName);
				this.router.navigate(['/board']);
				return;
			}

			this.showError = true;
			this.errorMessage = "Incorrect login information...";
			return;

		},
		(error)=>{
			alert("It appears we can't log you in, please try again later...")
		});

	}

}
