import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { Observable } from 'rxjs';
import { User } from './user';

@Injectable({ providedIn: 'root' })
export class AppService {

	constructor(private httpClient: HttpClient) { }

	public validateLogin(username: string, password: string): Observable<User>{
		return this.httpClient.post<User>('http://localhost:8080/to-do-app/validateLogin', {
			"username" : username,
			"password" : password
		});
	}

	public registerUser(firstName: string, lastName: string, email: string, username: string, password: string): Observable<Boolean>{
		return this.httpClient.post<Boolean>('http://localhost:8080/to-do-app/registerUser', {
			"firstName" : firstName,
			"lastName" : lastName,
			"email" : email,
			"username" : username,
			"password" : password
		});
	}

	public addNewTask(userId:number, title:string, description: string, status:string, dueDate:string): Observable<Task>{
		return this.httpClient.post<Task>('http://localhost:8080/to-do-app/addNewTask', {
			"userId" : userId,
			"title" : title,
			"description" : description,
			"status" : status,
			"dueDate" : dueDate
		});
	}

	public updateTask(userId:number, taskId:number, title:string, description:string, status:string, dueDate:string, view:string): Observable<Task[]>{
		return this.httpClient.post<Task[]>('http://localhost:8080/to-do-app/updateTask', {
			"userId" : userId,
			"taskId" : taskId,
			"title" : title,
			"description" : description,
			"status" : status,
			"dueDate" : dueDate,
			"view" : view
		});
	}

	public deleteTask(userId:number, taskId:number, view:number): Observable<Task[]>{
		return this.httpClient.post<Task[]>('http://localhost:8080/to-do-app/deleteTask', {
			"userId" : userId,
			"taskId" : taskId,
			"view" : view
		});
	}

	public getAllUserTask(userId:number): Observable<Task[]>{
		return this.httpClient.get<Task[]>('http://localhost:8080/to-do-app/getAllUserTask?id=' + userId);
	}

	public getAllOngoingUserTask(userId:number): Observable<Task[]>{
		return this.httpClient.get<Task[]>('http://localhost:8080/to-do-app/getAllOngoingUserTask?id=' + userId)
	}

	public getAllCompletedUserTask(userId:number): Observable<Task[]>{
		return this.httpClient.get<Task[]>('http://localhost:8080/to-do-app/getAllCompletedUserTask?id=' + userId)
	}

}
