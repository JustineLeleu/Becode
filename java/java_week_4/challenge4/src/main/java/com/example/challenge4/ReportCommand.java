package com.example.challenge4;

import org.springframework.stereotype.Component;

import java.util.LinkedList;
import java.util.List;

@Component
public class ReportCommand implements Command{

    List<RegisterCommand> register = new LinkedList<>();

    @Override
    public void execute() {
        displayRegister();
    }

    public void setRegister(RegisterCommand newRegister)
    {
        System.out.println(register);
        if (register.contains(newRegister)) System.out.println("already exist");
        else this.register.add(newRegister);
    }

    private void displayRegister()
    {
        for (RegisterCommand person : register)
        {
            System.out.println();
            System.out.println("Name: " + person.name);
            System.out.println("Last name: " + person.lastName);
            System.out.println("Visiting: " + ((person.doctor != null) ? person.doctor : "patient"));
            System.out.println("Time: " + person.time);
        }
    }
}
