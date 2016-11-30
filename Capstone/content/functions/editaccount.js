$( function() {
        $( "#accordion" ).accordion({
        header: "> form > h3"
    });
} );

$(function(){
    $(".dropdown-menu li a").click(function(){
        $(this).closest('.dropdown').find(".btn:first-child").text($(this).text());
        $(this).closest('.dropdown').find(".btn:first-child").val($(this).text());
    });
});
$( function() {
    var availableTags = [
        "University of Missouri",
        "University of Missouri - Saint Louis",
        "University of Missouri - Kansas City",
        "University of Illinois",
        "University of Iowa",
        "University of Arkansas",
        "University of Utah",
        "University of Alabama",
        "University of Michigan",
        "Clemson University",
        "University of Washington",
        "University of Louisville",
        "University of Ohio State",
        "University of Texas A&M",
        "University of Wisconsin",
        "University of Nebraska",
        "University of Florida",
        "University of Auburn",
        "University of Oklahoma",
        "University of Baylor",
        "University of West Virginia",
        "Louisiana State University",
        ];
    $( "#univ" ).autocomplete({
    source: availableTags
    });
});


$( function() {
    var majorTags = [
        "Athletic Training",
        "Biology",
        "Chemistry",
        "Environmental Science",
        "Exercise Sci/Kinesiology",
        "Fisheries and Wildlife",
        "Food Science",
        "Forest Management",
        "Marine Science",
        "Nursing",
        "Organic/Urban Farming",
        "Pharmacy",
        "Physicians Assistant",
        "Pre - Dental",
        "Pre - Medical",
        "Pre - Veterinary Medicine",
        "Apparel/Textile Design",
        "Architecture",
        "Dance",
        "Film/Broadcast",
        "Fine/Studio Art",
        "Graphic Design",
        "Industrial Design",
        "Interior Design",
        "Landscape Architecture",
        "Music",
        "Theatre",
        "Urban Planning",
        "Video Game Design",
        "Web Design/Digital Media",
        "Arts Management",
        "Education",
        "English/Writing",
        "Equine Science/Mgmt",
        "Family/Consumer Science",
        "History",
        "Journalism",
        "Language Studies",
        "Non-Profit Management",
        "Peace/Conflict Studies",
        "Philosophy",
        "Political Science",
        "Social Science",
        "Sports Turf/Golf Mgmt",
        "Women/Gender Studies",
        "Aerospace Engineering",
        "Astronomy",
        "Biomedical Engineering",
        "Chemical Engineering",
        "Civil Engineering",
        "Computer Science",
        "Electrical Engineering",
        "Energy Science",
        "Engineering",
        "Imaging Science",
        "Industrial Engineering",
        "Materials Science",
        "Mathematics",
        "Mechanical Engineering",
        "Accounting - General",
        "Applied Science",
        "Aviation/Aeronautics",
        "Business - General",
        "Construction Management",
        "Emergency Management",
        "Hospitality Management",
        "Human Resources Mgmt",
        "Information Systems (MIS)",
        "Insurance & Risk Mgmt",
        "Public Health",
        "Recreation & Tourism Mgmt",
        "Sport Management",
        "Supply Chain Mgmt (Logistics)",
        ];
    $( "#major" ).autocomplete({
    source: majorTags
    });
});