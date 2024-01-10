package org.extra.dataanalysistool.controllers;

import org.extra.dataanalysistool.repositories.DataRepository;
import org.springframework.http.HttpStatus;
import org.springframework.http.ResponseEntity;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RequestMethod;
import org.springframework.web.bind.annotation.RequestParam;
import org.springframework.web.bind.annotation.RestController;

@RestController
public class DataController {
    DataRepository data;

    public DataController(DataRepository data){
        this.data = data;
    }

    @RequestMapping(value = "/monthly_total", method = RequestMethod.GET)
    public ResponseEntity<Object> getMonthlyTotal(@RequestParam String year,
                                                  @RequestParam String month,
                                                  @RequestParam(required = false, defaultValue = "All") String country,
                                                  @RequestParam(required = false, defaultValue = "All") String commodity,
                                                  @RequestParam(required = false, defaultValue = "All") String transport_mode,
                                                  @RequestParam(required = false, defaultValue = "$") String measure) {
        return new ResponseEntity<>(data.getMonthlyTotal(year, month, country, commodity, transport_mode, measure), HttpStatus.OK);
    }

    @RequestMapping(value = "/monthly_average", method = RequestMethod.GET)
    public ResponseEntity<Object> getMonthlyAverage(@RequestParam String year,
                                                    @RequestParam String month,
                                                    @RequestParam(required = false, defaultValue = "All") String country,
                                                    @RequestParam(required = false, defaultValue = "All") String commodity,
                                                    @RequestParam(required = false, defaultValue = "All") String transport_mode,
                                                    @RequestParam(required = false, defaultValue = "$") String measure){
        return new ResponseEntity<>(data.getMonthlyAverage(year, month, country, commodity, transport_mode, measure), HttpStatus.OK);
    }

    @RequestMapping(value = "/yearly_total", method = RequestMethod.GET)
    public ResponseEntity<Object> getYearlyTotal(@RequestParam String year,
                                                 @RequestParam(required = false, defaultValue = "All") String country,
                                                 @RequestParam(required = false, defaultValue = "All") String commodity,
                                                 @RequestParam(required = false, defaultValue = "All") String transport_mode,
                                                 @RequestParam(required = false, defaultValue = "$") String measure){
        return new ResponseEntity<>(data.getYearlyTotal(year, country, commodity, transport_mode, measure), HttpStatus.OK);
    }

    @RequestMapping(value = "/yearly_average", method = RequestMethod.GET)
    public ResponseEntity<Object> getYearlyAverage(@RequestParam String year,
                                                 @RequestParam(required = false, defaultValue = "All") String country,
                                                 @RequestParam(required = false, defaultValue = "All") String commodity,
                                                 @RequestParam(required = false, defaultValue = "All") String transport_mode,
                                                 @RequestParam(required = false, defaultValue = "$") String measure){
        return new ResponseEntity<>(data.getYearlyAverage(year, country, commodity, transport_mode, measure), HttpStatus.OK);
    }

    @RequestMapping(value = "/overview", method = RequestMethod.GET)
    public ResponseEntity<Object> getOverview(){
        return new ResponseEntity<>(data.getOverview(), HttpStatus.OK);
    }
}
