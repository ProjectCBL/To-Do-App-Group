import { Component, EventEmitter, Input, OnInit, Output } from '@angular/core';
import { Task } from 'src/app/task';

@Component({
	selector: 'app-modal-editor',
	templateUrl: './modal-editor.component.html',
	styleUrls: ['./modal-editor.component.css']
})
export class ModalEditorComponent implements OnInit {

	@Input() editorType:string = "Update";
	@Input() task: Task = new Task();
	@Output() editorEvent = new EventEmitter<{task:Task, type:string}>();

	constructor() { }

	ngOnInit(): void {	
	}

	emitEvent(){
		console.log(this.task);
		//this.editorEvent.emit({task:this.task, type:this.editorType});
	}

}
