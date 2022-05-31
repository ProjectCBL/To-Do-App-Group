import { Component, EventEmitter, Input, OnInit, Output } from '@angular/core';
import { AppService } from 'src/app/app.service';
import { Task } from 'src/app/task';

@Component({
	selector: 'app-retrieve',
	templateUrl: './retrieve.component.html',
	styleUrls: ['./retrieve.component.css']
})
export class RetrieveComponent implements OnInit {

	@Output() updateTask = new EventEmitter<Task>();
	@Output() deleteTask = new EventEmitter<number>();

	tasks: Task[] = [];
	layout: Task[][] = [];

	constructor(private appService: AppService) { }

	ngOnInit(): void {
		this.switchView("all");
	}

	retrieveAllTasks() {

		let userId = localStorage.getItem("userId") as unknown as number;

		this.appService.getAllUserTask(userId).subscribe((response: any) => {
			this.tasks = response.map((task: any) => { return this.mapToTask(task) });
			this.layout = this.groupByThree(3, this.tasks);
			localStorage.setItem("view", "all");
		}, (error) => {
			console.log(error);
		});

	}

	retrieveAllCompletedTasks(){

		let userId = localStorage.getItem("userId") as unknown as number;

		this.appService.getAllCompletedUserTask(userId).subscribe((response: any) => {
			this.tasks = response.map((task: any) => { return this.mapToTask(task) });
			this.layout = this.groupByThree(3, this.tasks);
			localStorage.setItem("view", "done");
		}, (error) => {
			console.log(error);
		});

	}

	retrieveAllOngoingTasks(){

		let userId = localStorage.getItem("userId") as unknown as number;

		this.appService.getAllOngoingUserTask(userId).subscribe((response: any) => {
			this.tasks = response.map((task: any) => { return this.mapToTask(task) });
			this.layout = this.groupByThree(3, this.tasks);
			localStorage.setItem("view", "ongoing");
		}, (error) => {
			console.log(error);
		});

	}

	addTaskToDB(task:Task){

		let userId = localStorage.getItem("userId") as unknown as number;
		let view = localStorage.getItem("view") as unknown as string;

		task.status = (task.status == '') ? "Not-Started" : task.status;

		this.appService.addNewTask(userId, task.title, task.description, task.status, task.dueDate).subscribe((response:any)=>{
			console.log("Added Card");
			if(this.layout.length == 0){
				this.switchView(view);
			}else{

				if(this.layout[this.layout.length-1].length != 3){
					this.layout[this.layout.length-1].push(task);
				}
				else{
					this.layout.push([task]);
				}

			}
		}, (error)=>{
			alert("Failed to update card, please try again later...");
		});

	}

	updateTaskFromDB(task:Task){

		let userId = localStorage.getItem("userId") as unknown as number;
		let view = localStorage.getItem("view") as unknown as string;

		this.appService.updateTask(userId, task.taskId, task.title, task.description, task.status, task.dueDate, view).subscribe((response: any) => {
			console.log("Updated Card");
			for(let x = 0; x < this.layout.length; x++){
				for(let y = 0; y < this.layout[x].length; y++){
					if(this.layout[x][y].taskId == task.taskId){
						this.layout[x][y] = task;
						return;
					}
				}
			}
		},
		(error)=>{
			alert("Failed to update card, please try again later...");
		});

	}

	deleteTaskFromDB(taskId:number){
		let userId = localStorage.getItem("userId") as unknown as number;
		let view = localStorage.getItem("view") as unknown as string;

		this.appService.deleteTask(userId, taskId, view).subscribe((response:any)=>{
			console.log('Deleted Task');
			this.switchView(view);
		}, (error) =>{
			alert("Unable to delete task, please try again later...")
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

	switchView(view:string){
		switch(view){
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

	/*Bug: There appears to be bug or some sort of side effect that occurs prior to this method
	being called. If an update has occurred before, the previous card will update to the current
	card information.  In order to preserve the data we refresh the view.*/
	emitUpdateTask(task:Task){
		let view = localStorage.getItem("view") as unknown as string;
		this.switchView(view);
		this.updateTask.emit(task);
	}

}
