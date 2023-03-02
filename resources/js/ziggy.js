const Ziggy = {
  url: 'http://localhost:1003',
  port: 1003,
  defaults: {},
  routes: {
    'debugbar.openhandler': { uri: '_debugbar/open', methods: ['GET', 'HEAD'] },
    'debugbar.clockwork': {
      uri: '_debugbar/clockwork/{id}',
      methods: ['GET', 'HEAD'],
    },
    'debugbar.assets.css': {
      uri: '_debugbar/assets/stylesheets',
      methods: ['GET', 'HEAD'],
    },
    'debugbar.assets.js': {
      uri: '_debugbar/assets/javascript',
      methods: ['GET', 'HEAD'],
    },
    'debugbar.cache.delete': {
      uri: '_debugbar/cache/{key}/{tags?}',
      methods: ['DELETE'],
    },
    'sanctum.csrf-cookie': {
      uri: 'sanctum/csrf-cookie',
      methods: ['GET', 'HEAD'],
    },
    'ignition.healthCheck': {
      uri: '_ignition/health-check',
      methods: ['GET', 'HEAD'],
    },
    'ignition.executeSolution': {
      uri: '_ignition/execute-solution',
      methods: ['POST'],
    },
    'ignition.updateConfig': {
      uri: '_ignition/update-config',
      methods: ['POST'],
    },
    dashboard: { uri: 'dashboard', methods: ['GET', 'HEAD'] },
    boards: { uri: 'boards', methods: ['GET', 'HEAD'] },
    'boards.columns.store': {
      uri: 'boards/{board}/columns',
      methods: ['POST'],
      bindings: { board: 'id' },
    },
    'columns.destroy': {
      uri: 'columns/{column}',
      methods: ['DELETE'],
      bindings: { column: 'id' },
    },
    'columns.cards.store': {
      uri: 'columns/{column}/cards',
      methods: ['POST'],
      bindings: { column: 'id' },
    },
    'columns.cards.update': {
      uri: 'columns/{column}/cards/{card}',
      methods: ['PUT'],
      bindings: { column: 'id', card: 'id' },
    },
    'columns.cards.destroy': {
      uri: 'columns/{column}/cards/{card}',
      methods: ['DELETE'],
      bindings: { column: 'id', card: 'id' },
    },
    'cards.reorder': { uri: 'cards/reorder', methods: ['PUT'] },
    'profile.edit': { uri: 'profile', methods: ['GET', 'HEAD'] },
    'profile.update': { uri: 'profile', methods: ['PATCH'] },
    'profile.destroy': { uri: 'profile', methods: ['DELETE'] },
    register: { uri: 'register', methods: ['GET', 'HEAD'] },
    login: { uri: 'login', methods: ['GET', 'HEAD'] },
    'password.request': { uri: 'forgot-password', methods: ['GET', 'HEAD'] },
    'password.email': { uri: 'forgot-password', methods: ['POST'] },
    'password.reset': {
      uri: 'reset-password/{token}',
      methods: ['GET', 'HEAD'],
    },
    'password.store': { uri: 'reset-password', methods: ['POST'] },
    'verification.notice': { uri: 'verify-email', methods: ['GET', 'HEAD'] },
    'verification.verify': {
      uri: 'verify-email/{id}/{hash}',
      methods: ['GET', 'HEAD'],
    },
    'verification.send': {
      uri: 'email/verification-notification',
      methods: ['POST'],
    },
    'password.confirm': { uri: 'confirm-password', methods: ['GET', 'HEAD'] },
    'password.update': { uri: 'password', methods: ['PUT'] },
    logout: { uri: 'logout', methods: ['POST'] },
  },
};

if (typeof window !== 'undefined' && typeof window.Ziggy !== 'undefined') {
  Object.assign(Ziggy.routes, window.Ziggy.routes);
}

export { Ziggy };
