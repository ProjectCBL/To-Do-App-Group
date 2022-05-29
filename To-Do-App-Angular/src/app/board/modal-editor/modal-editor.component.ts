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
	@Output() editorUpdateEvent = new EventEmitter<{task:Task}>();
	@Output() editorAddEvent = new EventEmitter<{task:Task}>();

	constructor() { }

	ngOnInit(): void {	
	}

	emitEvent(){
		if(this.editorType == "Update"){
			this.editorUpdateEvent.emit({task:this.task});
		}
		else{
			this.editorAddEvent.emit({task:this.task});
		}
	}

}
