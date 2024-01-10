package com.example.challenge4;

import org.springframework.context.ApplicationContext;
import org.springframework.context.annotation.AnnotationConfigApplicationContext;

import java.util.Objects;
import java.util.Scanner;

public class Challenge4Application {

    public static void main(String[] args) {

        ApplicationContext context = new AnnotationConfigApplicationContext(CommandConfig.class);
        ReportCommand report = context.getBean(ReportCommand.class);

        Scanner scanner = new Scanner(System.in);
        String command;
        do{

            System.out.println("Command: ");
            command = scanner.nextLine();
            if (Objects.equals(command, "register")){
                RegisterCommand newRegister = context.getBean(RegisterCommand.class);
                newRegister.execute();
                continue;
            }
            if (Objects.equals(command, "report")){
                report.execute();
                continue;
            }

            System.out.println("Error in command: " + command);

        }while (!Objects.equals(command, "quit"));
    }

}
