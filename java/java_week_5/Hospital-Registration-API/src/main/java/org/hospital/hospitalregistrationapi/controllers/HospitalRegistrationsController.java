package org.hospital.hospitalregistrationapi.controllers;

import java.time.LocalDate;
import java.time.format.DateTimeFormatter;
import java.util.List;

import org.hospital.hospitalregistrationapi.entities.Doctor;
import org.hospital.hospitalregistrationapi.entities.Visit;
import org.hospital.hospitalregistrationapi.repositories.DoctorsRepository;
import org.hospital.hospitalregistrationapi.repositories.VisitsRepository;
import org.springframework.http.HttpStatus;
import org.springframework.http.ResponseEntity;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.PathVariable;
import org.springframework.web.bind.annotation.PostMapping;
import org.springframework.web.bind.annotation.PutMapping;
import org.springframework.web.bind.annotation.RequestBody;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RequestMethod;
import org.springframework.web.bind.annotation.RequestParam;
import org.springframework.web.bind.annotation.ResponseBody;
import org.springframework.web.bind.annotation.RestController;

@RestController
public class HospitalRegistrationsController {

    VisitsRepository visits;
    DoctorsRepository doctors;

    HospitalRegistrationsController(VisitsRepository visits, DoctorsRepository doctors)
    {
        this.visits = visits;
        this.doctors = doctors;
    }

//	Justine

    // POST method to add a visit with firstname, lastname and optional doctor id
	@RequestMapping(value = "/api/visits", method = RequestMethod.POST)
    public ResponseEntity<Object> registerVisitor(@RequestParam String firstName, @RequestParam String lastName, @RequestParam(required = false, defaultValue = "-1") int doctorId){
        Visit visit = (doctorId == -1) ? new Visit(firstName, lastName) : new Visit(firstName, lastName, doctorId);
        visits.addVisit(visit);
        return new ResponseEntity<>(visit.getId(), HttpStatus.CREATED);
    }

    // GET method to get the visits in a time period
    @RequestMapping(value = "/api/visits", method = RequestMethod.GET, params = {"startDate", "endDate"})
    public ResponseEntity<Object> getVisits(@RequestParam String startDate, @RequestParam String endDate){
        DateTimeFormatter formatter = DateTimeFormatter.ofPattern("yyyy-MM-dd");
        LocalDate start = LocalDate.parse(startDate, formatter);
        LocalDate end = LocalDate.parse(endDate, formatter);
        return new ResponseEntity<>(visits.getVisits(start, end), HttpStatus.OK);
    }

    // DELETE method to remove a doctor based on the id
    @RequestMapping(value = "/api/doctors/{id}", method = RequestMethod.DELETE)
    public ResponseEntity<Object> deleteDoctor(@PathVariable int id){
        doctors.delete(doctors.getById(id));
        return new ResponseEntity<>(HttpStatus.NO_CONTENT);
    }
	
//	Valentin
	
	
  @GetMapping("/api/visits")
  public String getVisits(@RequestParam String date) {
    DateTimeFormatter formatter = DateTimeFormatter.ofPattern("yyyy-MM-dd");
    LocalDate chosenDate = LocalDate.parse(date, formatter);
    return visits.getVisits(chosenDate);
  }
  
  @GetMapping("/api/doctors/{id}")
  public Doctor getDoctor(@PathVariable int id) {
    return doctors.getById(id);
  }

//	Virginie
	
	@PostMapping("/api/doctors")
	public ResponseEntity<Integer> create(@RequestBody Doctor doctor) throws Exception {
		if ((doctor.getName() == null) || (doctor.getSpecialization() == null)){
			throw new Exception("Some fields are null");
		} 
		else {
			doctors.addNewDoctor(doctor);
			return new ResponseEntity<>(doctor.getId(), HttpStatus.CREATED);
		}
	}

	@PutMapping("/api/doctors/{id}")
	public ResponseEntity<Object> update(@PathVariable("id") int id, @RequestBody Doctor updateDoctor) throws Exception {
		if ((updateDoctor.getName() == null) || (updateDoctor.getSpecialization() == null)){
			throw new Exception("Some fields are null");
		} 
		else {
			Doctor oldDoctor = doctors.getById(id);
			doctors.replace(oldDoctor, updateDoctor);
			return ResponseEntity.ok(updateDoctor);
		}
	}
	
	@GetMapping("/api/doctors")
	public @ResponseBody List<Doctor> listDoctors(){
		return doctors.getDoctors();
	}

}
