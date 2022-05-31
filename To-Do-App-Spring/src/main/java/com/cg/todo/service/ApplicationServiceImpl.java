package com.cg.todo.service;

import java.text.ParseException;
import java.text.SimpleDateFormat;
import java.util.Collections;
import java.util.Date;
import java.util.List;

import javax.persistence.EntityNotFoundException;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;
import org.springframework.transaction.annotation.Transactional;

import com.cg.todo.beans.CreateNewDeleteRequest;
import com.cg.todo.beans.CreateNewRegistrationRequest;
import com.cg.todo.beans.CreateNewTaskRequest;
import com.cg.todo.beans.CreateNewUpdateRequest;
import com.cg.todo.entities.TaskEntity;
import com.cg.todo.entities.UserEntity;
import com.cg.todo.repository.TaskRepository;
import com.cg.todo.repository.UserRepository;

@Service
public class ApplicationServiceImpl implements ApplicationService{

	@Autowired
	private UserRepository userRepo;
	
	@Autowired
	private TaskRepository taskRepo;
	
	private UserEntity getUser(Integer id) throws EntityNotFoundException {
		return userRepo.findById(id).get();
	}
	
	private TaskEntity getTask(Integer id) throws EntityNotFoundException {
		return taskRepo.findById(id).get();
	}
	
	private Date retrieveCorrectDate(String receivedDate) {
		try {
			SimpleDateFormat dateFormatter = new SimpleDateFormat("yyyy-MM-dd");
			Date date = dateFormatter.parse(receivedDate);
			return date;
		}
		catch(ParseException e) {
			return null;
		}
	}
	
	@Override
	public UserEntity validateLogin(String username, String password) {
		
		try {
			return userRepo.findByUsername(username, password);
		}
		catch(EntityNotFoundException e) {
			e.printStackTrace();
			return null;
		}
		
	}

	@Override
	@Transactional
	public Boolean registerNewUser(CreateNewRegistrationRequest req) {
		
		try{
			
			UserEntity newUser = new UserEntity();
			
			newUser.setFirstName(req.getFirstName());
			newUser.setLastName(req.getLastName());
			newUser.setEmail(req.getEmail());
			newUser.setUserName(req.getUsername());
			newUser.setPassword(req.getPassword());
			
			userRepo.save(newUser);
			
		}
		catch(Exception e) {
			e.printStackTrace();
			return false;
		}
		
		return true;
		
	}

	@Override
	@Transactional
	public TaskEntity addNewTask(CreateNewTaskRequest req) {
		
		try {
			
			UserEntity user = getUser(req.getUserId());
			TaskEntity newTask = new TaskEntity();
			
			newTask.setTitle(req.getTitle());
			newTask.setDescription(req.getDescription());
			newTask.setStatus(req.getStatus());
			newTask.setEntryDate(new Date());
			newTask.setDueDate((req.getDueDate() != null) ? retrieveCorrectDate(req.getDueDate()) : null);
			newTask.setUser(user);
			
			return taskRepo.save(newTask);
			
		}
		catch(Exception e) {
			e.printStackTrace();
		}
		
		return null;
		
	}

	@Override
	@Transactional
	public List<TaskEntity> updateTask(CreateNewUpdateRequest req) {
		
		try {
			
			TaskEntity task = getTask(req.getTaskId());
			
			task.setTitle(req.getTitle());
			task.setDescription(req.getDescription());
			task.setStatus(req.getStatus());
			task.setDueDate((req.getDueDate() != null) ? retrieveCorrectDate(req.getDueDate()) : null);
			
			taskRepo.save(task);
			
		}
		catch(Exception e) {
			e.printStackTrace();
		}
		
		return (req.getView().equals("all") ? getAllUserTask(req.getUserId()) : (req.getView().equals("done") ? 
				getAllCompletedUserTask(req.getUserId()) : getAllOngoingUserTask(req.getUserId())));
		
	}

	@Override
	@Transactional
	public List<TaskEntity> deleteTask(CreateNewDeleteRequest req) {
		
		try {
			taskRepo.deleteTaskAtId(req.getTaskId());
		}
		catch(Exception e) {
			e.printStackTrace();
		}
		
		return (req.getView().equals("all") ? getAllUserTask(req.getUserId()) : (req.getView().equals("done") ? 
				getAllCompletedUserTask(req.getUserId()) : getAllOngoingUserTask(req.getUserId())));
		
	}

	@Override
	public List<TaskEntity> getAllUserTask(Integer userId) {
		
		try {
			List<TaskEntity> taskList = taskRepo.getAllTaskFromUser(userId);
			return taskList;
		}
		catch(EntityNotFoundException e) {
			return Collections.emptyList();
		}
		
	}

	@Override
	public List<TaskEntity> getAllCompletedUserTask(Integer userId) {
		
		try {
			List<TaskEntity> taskList = taskRepo.getAllDoneUserTask(userId);
			return taskList;
		}
		catch(EntityNotFoundException e) {
			return Collections.emptyList();
		}
		
	}

	@Override
	public List<TaskEntity> getAllOngoingUserTask(Integer userId) {
		
		try {
			List<TaskEntity> taskList = taskRepo.getAllOngoingUserTask(userId);
			return taskList;
		}
		catch(EntityNotFoundException e) {
			return Collections.emptyList();
		}
		
	}

}
