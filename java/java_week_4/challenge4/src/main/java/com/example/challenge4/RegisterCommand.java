package com.example.challenge4;

import org.springframework.stereotype.Component;

import java.time.LocalDateTime;
import java.util.Objects;
import java.util.Scanner;

@Component
public class RegisterCommand implements Command{

    ReportCommand report;
    String name;
    String lastName;
    String doctor;
    LocalDateTime time;

    RegisterCommand(ReportCommand report)
    {
        this.report = report;
    }

    @Override
    public void execute()
    {
        getInfos();
        this.time = java.time.LocalDateTime.now();
        this.report.setRegister(this);
    }

    private void getInfos()
    {
        Scanner scanner = new Scanner(System.in);
        System.out.println("Name: ");
        this.name = scanner.nextLine();
        System.out.println("Last name: ");
        this.lastName = scanner.nextLine();
        chooseVisit();
    }

    private void chooseVisit()
    {
        Scanner scanner = new Scanner(System.in);
        System.out.println("Visiting doctor or patient: ");
        String response = scanner.nextLine();

        if (Objects.equals(response, "doctor")){
            visitDoctor();
            return;
        }

        if (Objects.equals(response, "patient")){
            this.doctor = null;
            return;
        }

        System.out.println("Answer with doctor or patient !");
        chooseVisit();
    }

    private void visitDoctor()
    {
        Scanner scanner = new Scanner(System.in);
        System.out.println("Doctor Truc or Doctor Bidule :");
        String doctor = scanner.nextLine();

        if (Objects.equals(doctor, "Truc")){
            this.doctor = "Doctor Truc";
            return;
        }

        if (Objects.equals(doctor, "Bidule")){
            this.doctor = "Doctor Bidule";
            return;
        }

        System.out.println("Answer with Truc or Bidule !");
        visitDoctor();
    }
}
