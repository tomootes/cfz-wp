

  /***********************************************************************************
  ** Render functions
  ***********************************************************************************/
  /**
  Render the social items list
  */
  function renderList(data) {
    // set table header
    var tableHead = '<thead><tr><th class="column-cb check-column"></th><th class="column-date">Publish Date</th><th class="column-title column-primary">Content</th><th class="column-author">Source</th><th class="column-author">Author</th><th class="column-date">Date</th></tr></thead>';

    // generate table body
    var tableBody = '<tbody>';
    data.forEach(function(item) {
      var publishDate = (item.publishDate !== null) ? moment(item.publishDate).format('YYYY/MM/DD HH:mm') : 'Not published',
          date = moment(item.date).format('YYYY/MM/DD HH:mm'),
          checkboxChecked = (item.publishDate !== null) ? ' checked' : '';

      // generate table row
      var tr = '<tr>';
      tr += '<td class="check-column"><input type="checkbox"' + checkboxChecked + ' onclick="publish(\'' + item.id + '\');" style="margin-left: 7px;"></td>';
      tr += '<td class="column-date">' + publishDate + '</td>';
      tr += '<td class="column-title column-primary">' + item.text + '</td>';
      tr += '<td class="column-author">' + item.source + '</td>';
      tr += '<td class="column-author">' + item.authorName + '</td>';
      tr += '<td class="column-date">' + date + '</td>';
      tr += '</tr>';

      tableBody += tr; // add table row to table body
    })
    tableBody += '</tbody>';

    // add table content to DOM
    document.getElementById("sociallist").innerHTML = tableHead + tableBody;
  }



  /**
  Render paging controls
  */
  function renderPaging(data) {
    var numberOfPages = Math.ceil(data.count / limit);
    document.getElementById("paging-index").innerHTML = page + " of " + numberOfPages;
  }



  /**
  Render all
  */
  function render(data) {
    renderList(data.data);
    renderPaging(data);
  }



  /***********************************************************************************
  ** Data functions
  ***********************************************************************************/
  /**
  Make update call to api
  */
  function updateData(id, date) {
    var url = API_URL + "/api/social",
        body = {"id": String(id), "publishDate": date},
        config = {
          headers: {'Authorization': API_KEY}
        };

    axios.put(url, body, config)
      .then(function (response) {

      })
      .catch(function (error) {
        console.log(error);
      });
  }



  /**
  Get data from api
  */
  function getData(limit, page, source, query) {


    var url = API_URL + "/api/social?source=" + source + "&limit=" + limit + "&page=" + page + "&q=" + query,
        config = {
          headers: {'Authorization': API_KEY}
        };

      console.log(url);

    axios.get(url, config)
      .then(function (response) {
// console.log(response);
        dataset = response.data;
        render(dataset);
      })
      .catch(function (error) {
        console.log(error);
      });
  }


  /***********************************************************************************
  ** Event handlers
  ***********************************************************************************/
  /**
  Update publish status of social item
  */
  function publish(id) {
    // update dataset
    dataset.data.forEach(function(item) { // loop dataset
      if(String(item.id) === String(id)) { // find item
        // set publish date
        if(item.publishDate === null) {
          item.publishDate = moment().format();
        } else {
          item.publishDate = null;
        }

        //
        updateData(item.id, item.publishDate);
        renderList(dataset.data);
        // render(dataset);
      }
    })
  }



  /**
  Search handler
  */
  function search() {
    query = document.getElementById("search-social-input").value;
    page = 1; // reset page to make sure there is a result
    getData(limit, page, source, query);
  }



  /**
  Filter handler
  */
  function filter() {
    var el = document.getElementById("source-filter");
    source = el.options[el.selectedIndex].value;
    page = 1; // reset page to make sure there is a result
    getData(limit, page, source, query);
  }



  /**
  Change the numbe rof rows event handler
  */
  function changeRows() {
    var el = document.getElementById("paging-filter");
    limit = el.options[el.selectedIndex].value;
    page = 1; // reset page to make sure there is a result
    getData(limit, page, source, query);
  }



  /**
  Previous page event handler
  */
  function prevPage() {
    var numberOfPages = Math.ceil(dataset.count / limit);
    if(page > 1) {
      page--;
    } else {
      page = numberOfPages;
    }
    getData(limit, page, source, query);
  }



  /**
  Next page event handler
  */
  function nextPage() {
    var numberOfPages = Math.ceil(dataset.count / limit);
    if(page < numberOfPages) {
      page++;
    } else {
      page = 1;
    }
    getData(limit, page, source, query);
  }



  /***********************************************************************************
  **
  ***********************************************************************************/
  var dataset = null,
      limit = 10,
      page = 1,
      source = "",
      query = "";


  getData(limit, page, source, query);
