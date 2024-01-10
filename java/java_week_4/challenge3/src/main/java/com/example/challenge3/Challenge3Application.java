package com.example.challenge3;

import org.springframework.context.ApplicationContext;
import org.springframework.context.annotation.AnnotationConfigApplicationContext;

import java.util.Objects;
import java.util.Scanner;

public class Challenge3Application {

    public static void main(String[] args) {
        ApplicationContext context = new AnnotationConfigApplicationContext(CommandConfig.class);
        HelloCommand helloCommand = context.getBean(HelloCommand.class);
        TimeCommand timeCommand = context.getBean(TimeCommand.class);

        Scanner scanner = new Scanner(System.in);
        String command;
        do{

            System.out.println("Command: ");
            command = scanner.nextLine();
            if (Objects.equals(command, "hello")){
                helloCommand.execute();
                continue;
            }
            if (Objects.equals(command, "time")){
                timeCommand.execute();
                continue;
            }

            System.out.println("Error in command: " + command);

        }while (!Objects.equals(command, "quit"));
    }
}
