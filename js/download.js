		function downlow() {
		         selectElement = document.querySelector('#inlineform'); 
		                      
		            output = selectElement.options[selectElement.selectedIndex].value;
		            if(output=='0')
		            {
		            alert(" Broken!!");
		            }
		            else if(output=='1')
		            {
		            writeCSV();
		            }
		            else if(output=='2')
		            {
		            writeJSON();
		            }
		            else if(output=='3')
		            {
		            writeXML();
		            }
		   
		    }
		    
		    function writeJSON() {
		    var resultsObject = {"Result" : []};
		    var fileName = document.getElementById("form_name").value;
		    var name = fileName + ".json";
		    var results = document.getElementsByClassName("results")[0];
		    var indRes = results.children;
		    for (var i = 1; i < indRes.length-1; i++)
		    {
			    if(i==1)
				{
				    if (indRes[i].children[0].children[0].checked)
				     {
					    var title = indRes[i].children[1].innerHTML;
					    var url =   indRes[i].children[2].innerHTML;
					    var description = indRes[i].children[3].innerHTML;
					    var result = {"title": title, "url":url, "description":description};
					    resultsObject["Result"].push(result);
					}
				}
				
				else
				{
				    if (indRes[i].children[0].checked)
				     {
					    var title = indRes[i].children[1].innerHTML;
					    var url =   indRes[i].children[2].innerHTML;
					    var description = indRes[i].children[3].innerHTML;
					    var result = {"title": title, "url":url, "description":description};
					    resultsObject["Result"].push(result);
					}
				}
		    }
		    
		    download(JSON.stringify(resultsObject), name, 'text/plain');
		}   



		function download(text, name, type) {
		    var a = document.createElement('a');
		    var file = new Blob([text], {type: type});
		    a.href = URL.createObjectURL(file);
		    a.download = name;
		    a.click();
		
		}






function writeCSV() {
	var fileName = document.getElementById("form_name").value;
    var name = fileName + ".csv";
    var results = document.getElementsByClassName("results")[0];
    var indRes = results.children;
    var result = "";
		    for (var i = 1; i < indRes.length-1; i++)
		    {
			    if(i==1)
				{
				    if (indRes[i].children[0].children[0].checked)
				     {
					    var title = indRes[i].children[1].innerHTML;
					    title = title.replace(',','');
					    var url =   indRes[i].children[2].innerHTML;
					    url = url.replace(',','');
					    var description = indRes[i].children[3].innerHTML;
					    description = description.replace(',','');
	    				var result = result + title + "," + url + "," + description+"\n";
					}
				}
				
				else
				{
				    if (indRes[i].children[0].checked)
				     {
					     var title = indRes[i].children[1].innerHTML;
					    title = title.replace(',','');
					    var url =   indRes[i].children[2].innerHTML;
					    url = url.replace(',','');
					    var description = indRes[i].children[3].innerHTML;
					    description = description.replace(',','');
	    				var result = result + title + "," + url + "," + description+"\n";
					}
				}
		    }
    result = result.trim();
    download(result, name, 'text/plain');
}

function writeXML() {
    var fileName = document.getElementById("form_name").value;
    var name = fileName + ".xml";
    var results = document.getElementsByClassName("results")[0];
    var indRes = results.children;
    var result = "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n<results>\n";
    		    for (var i = 1; i < indRes.length-1; i++)
		    {
			    if(i==1)
				{
				    if (indRes[i].children[0].children[0].checked)
				     {
					    var title = indRes[i].children[1].innerHTML;
					    title = title.replace(',','');
					    var url =   indRes[i].children[2].innerHTML;
					    url = url.replace(',','');
					    var description = indRes[i].children[3].innerHTML;
					    description = description.replace(',','');
					    var result = result + "<result>\n<title>" + title + "</title>\n"
           					 + "<url>" + url + "</url>\n" + "<description>" 
          				  + description + "</description>\n</result>\n";
					}
				}
				
				else
				{
				    if (indRes[i].children[0].checked)
				     {
					     var title = indRes[i].children[1].innerHTML;
					    title = title.replace(',','');
					    var url =   indRes[i].children[2].innerHTML;
					    url = url.replace(',','');
					    var description = indRes[i].children[3].innerHTML;
					    description = description.replace(',','');
					    var result = result + "<result>\n<title>" + title + "</title>\n"
           					 + "<url>" + url + "</url>\n" + "<description>" 
          				  + description + "</description>\n</result>\n";
					}
				}
		    }
    result += "</results>";
    download(result, name, 'text/plain');
}

 
                
                                
$("#download-form").submit(function(e) {
    e.preventDefault();
     $("html, body").animate({ scrollTop: 0 }, "slow");
});

