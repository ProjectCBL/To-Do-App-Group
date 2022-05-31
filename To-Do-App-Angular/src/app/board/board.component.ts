import { Component, OnInit, ViewChild } from '@angular/core';
import { Task } from '../task';
import { Router } from '@angular/router';

@Component({
	selector: 'app-board',
	templateUrl: './board.component.html',
	styleUrls: ['./board.component.css']
})
export class BoardComponent implements OnInit {

	view:string="all";
	firstname:string = "";
	editorType:string = "Update"
	modalEditorTask:Task = new Task();
	displayComponents:boolean = false;

	constructor(private router:Router) { }

	ngOnInit(): void {
		this.firstname = localStorage.getItem("firstname") as string;
		localStorage.setItem("view", this.view);
	}

	showModalAddEditor(){
		this.editorType = "Add";
		this.resetTask();
	}

	showModalUpdateEditor(task:Task){
		this.editorType = "Update";
		this.transmitDataToModal(task);
	}

	transmitDataToModal(task:Task){
		this.grabCardTask(task);
	}

	grabCardTask(task:Task){
		this.modalEditorTask.taskId = task.taskId;
		this.modalEditorTask.title = task.title;
		this.modalEditorTask.description = task.description;
		this.modalEditorTask.status = task.status;
		this.modalEditorTask.entryDate = task.entryDate;
		this.modalEditorTask.dueDate = task.dueDate;
	}

	updateView(){
		localStorage.setItem("view", this.view);
	}

	resetTask(){
		this.modalEditorTask = new Task();
	}

	logout(){
		this.router.navigate(['']);
	}

}
