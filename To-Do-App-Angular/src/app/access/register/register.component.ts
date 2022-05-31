import { Component, EventEmitter, OnInit, Output } from '@angular/core';
import { AppService } from 'src/app/app.service';
import { User } from 'src/app/user';

@Component({
	selector: 'app-register',
	templateUrl: './register.component.html',
	styleUrls: ['./register.component.css']
})
export class RegisterComponent implements OnInit {

	@Output() switchToLogin = new EventEmitter();

	user: User = new User();
	showError: boolean = false;
	errorMessage: string = "";

	constructor(private appService: AppService) { }

	ngOnInit(): void {
	}

	registerUser() {

		if (this.user.firstName == '' || this.user.lastName == '' || this.user.email == '' || this.user.username == '' || this.user.password == '') {
			this.showError = true;
			this.errorMessage = "Make sure to fill all fields...";
			return;
		}

		this.appService.registerUser(this.user.firstName, this.user.lastName, this.user.email, this.user.username, this.user.password).subscribe((response: any) => {

			if (response != null && response == true) {
				alert("You have successfully registered, click ok to continue.");
				this.switchToLogin.emit();
			}

		},
		(error) => {
			this.showError = true;
			this.errorMessage = "That username already exists...";
			return;
		});

	}

}
