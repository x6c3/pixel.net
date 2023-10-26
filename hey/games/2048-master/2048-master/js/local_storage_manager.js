window.fakeStorage = {
  _data: {},

  setItem: function (id, val) {
    return this._data[id] = String(val);
  },

  getItem: function (id) {
    return this._data.hasOwnProperty(id) ? this._data[id] : undefined;
  },

  removeItem: function (id) {
    return delete this._data[id];
  },

  clear: function () {
    return this._data = {};
  }
};

function LocalStorageManager() {
  this.bestScoreKey = "bestScore";
  this.gameStateKey = "gameState";
  this.bestScoreResetFlagKey = "bestScoreResetFlag";

  var supported = this.localStorageSupported();
  this.storage = supported ? window.localStorage : window.fakeStorage;
}

LocalStorageManager.prototype.localStorageSupported = function () {
  var testKey = "test";

  try {
    var storage = window.localStorage;
    storage.setItem(testKey, "1");
    storage.removeItem(testKey);
    return true;
  } catch (error) {
    return false;
  }
};

LocalStorageManager.prototype.getBestScore = function () {
  return this.storage.getItem(this.bestScoreKey) || 0;
};

LocalStorageManager.prototype.setBestScore = function (score) {
  if (!this.hasBestScoreBeenReset()) {
    this.storage.setItem(this.bestScoreKey, score);
  }
};

LocalStorageManager.prototype.hasBestScoreBeenReset = function () {
  return this.storage.getItem(this.bestScoreResetFlagKey) === "true";
};

LocalStorageManager.prototype.resetBestScore = function () {
  this.storage.setItem(this.bestScoreKey, 0);
  this.storage.setItem(this.bestScoreResetFlagKey, "true");
};

LocalStorageManager.prototype.clearLocalStorage = function () {
  // Clear the entire local storage
  this.storage.clear();
};

LocalStorageManager.prototype.getGameState = function () {
  var stateJSON = this.storage.getItem(this.gameStateKey);
  return stateJSON ? JSON.parse(stateJSON) : null;
};

LocalStorageManager.prototype.setGameState = function (gameState) {
  this.storage.setItem(this.gameStateKey, JSON.stringify(gameState));
};

LocalStorageManager.prototype.clearGameState = function () {
  this.storage.removeItem(this.gameStateKey);
};
