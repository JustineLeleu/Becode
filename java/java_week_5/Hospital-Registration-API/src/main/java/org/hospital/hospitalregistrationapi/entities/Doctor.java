package org.hospital.hospitalregistrationapi.entities;

public class Doctor {
	
	private String name;
	private String specialization;
	private int id;
	private static int lastId;

	public Doctor() {
		this.id = ++lastId;
	}
	
	public Doctor(String name, String specialization) {
		this();
		this.name = name;
		this.specialization = specialization;
	}

	public static int getLastId() {
		return lastId;
	}

	public static void setLastId(int lastId) {
		Doctor.lastId = lastId;
	}

	public String getName() {
		return name;
	}
	public void setName(String name) {
		this.name = name;
	}
	public String getSpecialization() {
		return specialization;
	}
	public void setSpecialization(String specialization) {
		this.specialization = specialization;
	}
	public int getId() {
		return id;
	}
	public void setId(int id) {
		this.id = id;
	}

}
