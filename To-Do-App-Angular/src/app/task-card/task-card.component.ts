import { Component, Input, OnInit, Output, EventEmitter } from '@angular/core';
import { AppService } from '../app.service';
import { Task } from '../task';

@Component({
	selector: 'app-task-card',
	templateUrl: './task-card.component.html',
	styleUrls: ['./task-card.component.css']
})
export class TaskCardComponent implements OnInit {

	@Input() task: Task = new Task();
	@Output() deleteTask = new EventEmitter<number>();
	@Output() updateTask = new EventEmitter<number>();

	previousStatus: string = "";
	showButtons: boolean = false;
	completed: boolean = false;

	constructor(private appService: AppService) { }

	ngOnInit(): void {
		this.previousStatus = (this.task.status == "Done") ? "Not-Started" : "Done";
	}

	triggerDeleteEvent() {
		this.deleteTask.emit(this.task.taskId);
	}

	triggerUpdateEvent() {
		this.deleteTask.emit(this.task.taskId);
	}

	toggleButtons(): void {
		this.showButtons = !this.showButtons;
	}

	toggleComplete() {
		this.completed = !this.completed;
		this.previousStatus = [this.task.status, this.task.status = this.previousStatus][0];
		this.updateStatus();
	}

	updateStatus() {

		let userId = localStorage.getItem("userId") as unknown as number;
		let view = localStorage.getItem("view") as unknown as string;

		this.appService.updateTask(userId, this.task.taskId, this.task.title, this.task.description, this.task.status, this.task.dueDate, view).subscribe((response: any) => {
			console.log("Updated Status");
		},
		(error)=>{
			this.previousStatus = [this.task.status, this.task.status = this.previousStatus][0];
			this.completed = !this.completed;
			console.log("Failed to update status");
		});

	}

	getTextColor(){
		switch(this.task.status){
			case "Not-Started":
				return "black";
			case "In-Progress":
				return "#9966ff";
			case "Done":
				return "green";
			case "OverDue":
				return "#990000";
			default:
				return "black";
		}
	}

}
