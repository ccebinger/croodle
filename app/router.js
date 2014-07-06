var Router = Ember.Router.extend(); // ensure we don't share routes between all Router instances

Router.map(function(){
     this.route('poll', { path: '/poll/:poll_id' });
     this.resource('create', function(){
         this.route('meta');
         this.route('options');
         this.route('settings');
     });
});

export default Router;
