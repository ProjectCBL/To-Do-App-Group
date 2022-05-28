import { Component, Input, OnInit } from '@angular/core';
import { AppService } from 'src/app/app.service';
import { Task } from 'src/app/task';

@Component({
	selector: 'app-retrieve',
	templateUrl: './retrieve.component.html',
	styleUrls: ['./retrieve.component.css']
})
export class RetrieveComponent implements OnInit {

	@Input() view: string = "";

	tasks: Task[] = [];
	layout: Task[][] = [];

	constructor(private appService: AppService) { }

	ngOnInit(): void {
		this.switchView();
	}

	retrieveAllTasks() {

		let userId = 1;

		this.appService.getAllUserTask(userId).subscribe((response: any) => {
			this.tasks = response.map((task: any) => { return this.mapToTask(task) });
			this.layout = this.groupByThree(3, this.tasks);
			console.log(this.layout);
		}, (error) => {

		});

	}

	retrieveAllCompletedTasks(){

		let userId = 1;

		this.appService.getAllCompletedUserTask(userId).subscribe((response: any) => {
			this.tasks = response.map((task: any) => { return this.mapToTask(task) });
			this.layout = this.groupByThree(3, this.tasks);
			console.log(this.layout);
		}, (error) => {

		});

	}

	retrieveAllOngoingTasks(){

		let userId = 1;

		this.appService.getAllOngoingUserTask(userId).subscribe((response: any) => {
			this.tasks = response.map((task: any) => { return this.mapToTask(task) });
			this.layout = this.groupByThree(3, this.tasks);
			console.log(this.layout);
		}, (error) => {

		});

	}

	mapToTask(task: any): any {

		let tempTask = new Task();

		tempTask.taskId = task.taskId;
		tempTask.title = task.title;
		tempTask.description = task.description;
		tempTask.status = task.status;
		tempTask.entryDate = task.entryDate;
		tempTask.dueDate = task.dueDate;

		return tempTask;

	}

	groupByThree(n:number, tasks:Task[]){
		let grouped = [];
		for (let i = 0; i < tasks.length; i += n) grouped.push(tasks.slice(i, i + n));
		return grouped;
	}

	switchView(){
		switch(this.view){
			case "ongoing":
				this.retrieveAllOngoingTasks();
				break;
			case "done":
				this.retrieveAllCompletedTasks();
				break;
			default:
				this.retrieveAllTasks();
				break;
		}
	}

}
