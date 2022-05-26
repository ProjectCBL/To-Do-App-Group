package com.todo.main;

import org.springframework.boot.SpringApplication;
import org.springframework.boot.autoconfigure.SpringBootApplication;
import org.springframework.boot.autoconfigure.domain.EntityScan;
import org.springframework.context.annotation.Bean;
import org.springframework.data.jpa.repository.config.EnableJpaRepositories;

import com.cg.todo.service.ApplicationService;
import com.cg.todo.service.ApplicationServiceImpl;

@SpringBootApplication
@EntityScan("com.cg.todo.entities")
@EnableJpaRepositories("com.cg.todo.repository")
public class ToAppAppSpringApplication {

	@Bean
	public ApplicationService sessionService() {
		return new ApplicationServiceImpl();
	}
	
	public static void main(String[] args) {
		SpringApplication.run(ToAppAppSpringApplication.class, args);
	}

}
