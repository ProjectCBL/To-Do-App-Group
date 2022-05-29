import { Component, OnInit } from '@angular/core';
import { Task } from '../task';

@Component({
	selector: 'app-access',
	templateUrl: './access.component.html',
	styleUrls: ['./access.component.css']
})
export class AccessComponent implements OnInit {

	isLogin:boolean = true;

	constructor() { 
		
	}

	ngOnInit(): void {
	}

	toggleAccess(){
		this.isLogin = !this.isLogin;
	}

}
