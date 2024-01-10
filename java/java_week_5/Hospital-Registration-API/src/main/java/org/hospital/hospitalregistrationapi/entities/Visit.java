package org.hospital.hospitalregistrationapi.entities;

import java.util.UUID;

public class Visit {
	
	private String firstName;
	private String lastName;
	private UUID id;
	private int doctorId;
	private String visitTimestamp;
	
	public Visit() {
		this.id = UUID.randomUUID();
		this.visitTimestamp = String.valueOf(java.time.LocalDate.now());
	}
	
	public Visit(String firstName, String lastName, int id, String visitTimestamp) {
		this.firstName = firstName;
		this.lastName = lastName;
		this.id = UUID.randomUUID();
		
		this.visitTimestamp = visitTimestamp;
    }
	
	public Visit(String firstName, String lastName) {
		this();
		this.firstName = firstName;
		this.lastName = lastName;
	}

	public Visit(String firstName, String lastName, int doctorId) {
		this();
		this.firstName = firstName;
		this.lastName = lastName;
		this.doctorId = doctorId;
	}

	public String getFirstName() {
		return firstName;
	}
	public void setFirstName(String firstName) {
		this.firstName = firstName;
	}
	public String getLastName() {
		return lastName;
	}
	public void setLastName(String lastName) {
		this.lastName = lastName;
	}
	public String getId() {
		return String.valueOf(id);
	}
	public void setId(UUID id) {
		this.id = id;
	}
	public int getDoctorId() {
		return doctorId;
	}
	public void setDoctorId(int doctorId) {
		this.doctorId = doctorId;
	}
	public String getVisitTimestamp() {
		return visitTimestamp;
	}
	public void setVisitTimestamp(String visitTimestamp) {
		this.visitTimestamp = visitTimestamp;
	}
	
}
