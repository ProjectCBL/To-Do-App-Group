package com.cg.todo.entities;

import java.util.Date;

import javax.persistence.CascadeType;
import javax.persistence.Column;
import javax.persistence.Entity;
import javax.persistence.GeneratedValue;
import javax.persistence.GenerationType;
import javax.persistence.Id;
import javax.persistence.JoinColumn;
import javax.persistence.ManyToOne;
import javax.persistence.Table;
import javax.persistence.Temporal;
import javax.persistence.TemporalType;

import lombok.AllArgsConstructor;
import lombok.Getter;
import lombok.NoArgsConstructor;
import lombok.Setter;

@Setter
@Getter
@Entity
@NoArgsConstructor
@AllArgsConstructor
@Table(name = "Tasks")
public class TaskEntity {

	@Id
	@Column(name = "task_id")
	@GeneratedValue(strategy=GenerationType.IDENTITY)
	private Integer taskId;
	
	@Column(name="title", nullable=false)
	private String title;
	
	@Column(name="description")
	private String description;
	
	@ManyToOne(cascade=CascadeType.PERSIST, targetEntity=UserEntity.class)
	@JoinColumn(name = "account_id", nullable=false, referencedColumnName="user_id")
	private UserEntity user;
	
	@Column(name="status", nullable=false)
	private String status;
	
	@Temporal(TemporalType.DATE)
	@Column(name="entry_date", nullable=true)
	private Date entryDate;
	
	@Temporal(TemporalType.DATE)
	@Column(name="due_date", nullable=true)
	private Date dueDate;
	
}
