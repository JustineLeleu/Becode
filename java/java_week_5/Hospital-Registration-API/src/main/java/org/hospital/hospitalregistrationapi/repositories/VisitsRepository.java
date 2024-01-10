package org.hospital.hospitalregistrationapi.repositories;

import java.time.LocalDate;
import java.time.ZoneId;
import java.time.format.DateTimeFormatter;
import java.util.ArrayList;
import java.util.List;

import org.hospital.hospitalregistrationapi.entities.Visit;
import org.springframework.stereotype.Repository;

@Repository
public class VisitsRepository {
	
	private List<Visit> visits = new ArrayList<>();
	
	public VisitsRepository() {

		Visit visit1 = new Visit("Joseph","Dupont",4, "2024-01-01");
		visits.add(visit1);
		Visit visit2 = new Visit("Alice","Dumarais",3, "2024-01-01");
		visits.add(visit2);
		Visit visit3 = new Visit("Adelaide","Dulak",4, "2024-01-03");
		visits.add(visit3);
		Visit visit4 = new Visit("Antonin","Dubois",1, "2024-01-04");
		visits.add(visit4);
	}

	public void addVisit(Visit visit){
		visits.add(visit);
	}
	
	
	// Get visits method
	public String getVisits(LocalDate chosenDate) {
		DateTimeFormatter formatter = DateTimeFormatter.ofPattern("yyyy-MM-dd");
		String visitsInfo = "";
		
		for (Visit visit : visits) {
			String date = visit.getVisitTimestamp();
			LocalDate localDate = LocalDate.parse(date, formatter)
							.atStartOfDay(ZoneId.systemDefault())
							.toLocalDate();
			
			if (localDate.equals(chosenDate)) {
				visitsInfo += visit.getFirstName() + " " + visit.getLastName() + " " + visit.getVisitTimestamp() + "\n";
			}
		}
		
		if (visitsInfo.isEmpty()) {
			visitsInfo = "No visits on " + chosenDate.format(formatter);
		}
		
		return visitsInfo;
	}

	public String getVisits(LocalDate start, LocalDate end){
		String visitsInfo = "";

		for (Visit visit : visits){
			LocalDate date = LocalDate.parse(visit.getVisitTimestamp());
			if (date.isAfter(start) && date.isBefore(end) || date.isEqual(start) || date.isEqual(end)){
				visitsInfo += visit.getFirstName() + " " + visit.getLastName() + " " + visit.getVisitTimestamp() + "\n";
			}
		}

		if (visitsInfo.isEmpty()) {
			visitsInfo = "No visits between " + start + " and " + end;
		}

		return visitsInfo;
	}
}
