var Dashboard = {

  initialize: function(element){
    this.el = element;

    this.$collectionHolder = this.el.find('.arrFilters');

    // setup an "add a filter" link
    this.$addFilterLink = $('<a href="#" class="add_filter_link" >Add a filter</a>');
    this.$newLinkLi = $('<li></li>').append(this.$addFilterLink);
    this.$collectionHolder.append(this.$newLinkLi);
    this.$collectionHolder.data('index', this.$collectionHolder.find(':input').length);

    var self = this;
    this.$collectionHolder.find('div').each(function() {
        self.addFilterFormDeleteLink($(this));
    });
    this.event();
  },
  event: function(){

    var self = this;

    this.el.find('.add_filter_link').bind('click', function(e){
      // prevent the link from creating a "#" on the URL
      e.preventDefault();
        // Get the data-prototype explained earlier
      var prototype = self.$collectionHolder.data('prototype');
      // get the new index
      var index = self.$collectionHolder.data('index');
      // Replace '__name__' in the prototype's HTML to
      // instead be a number based on how many items we have
      var newForm = prototype.replace(/__name__/g, index);
      // increase the index with one for the next item
      self.$collectionHolder.data('index', index + 1);
      // Display the form in the page in an li, before the "Add a filter" link li
      var $newFormLi = $('<div></div>').append(newForm);
      self.$newLinkLi.before($newFormLi);
      self.addFilterFormDeleteLink($newFormLi);
        
    });
  },
  addFilterFormDeleteLink: function($filterFormLi){
    var $removeFormA = $('<a href="#">delete this filter</a>');
    $filterFormLi.append($removeFormA);

    $removeFormA.on('click', function(e) {
        // prevent the link from creating a "#" on the URL
        e.preventDefault();

        // remove the li for the filter form
        $filterFormLi.remove();
    });
  }
};
$(function(){
  Dashboard.initialize($('.body-dashboard'));
});