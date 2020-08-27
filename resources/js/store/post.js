// ディスカッションページ用のmodule

const state = {
  posts: {
    // id: {},
    // title: {},
    // description: {},
    // img_url: {},
  }
};

const getters = {
  getPosts (state) {
    return state.posts;
  },
  // idで検索
  // getPostById: (state) => (id) => {
  //   const post = state.posts.find((post) => {
  //       return post.id === id
  //   });
  //   if (post) {
  //       return post.title, post.description;
  //   } else {
  //       return "";
  //   }
  // },
  getPostById: (state) => (id) => {
    const post = state.posts.find((post) => {
        return post.id === $route.params.id
    });
    if (post) {
        return post.title, post.description;
    } else {
        return "";
    }
  },
};

const mutations = {
  setData(state, posts) {
      state.posts = posts
  },
  update(state, {post, newPost}) {
      Object.assign(post, newPost);
  },
  delete(state, index) {
      state.posts.splice(index, 1);
  },
  add(state, post) {
      state.posts.push(post);
  }
};

// Post用のAPIを作成するか、Imageを代用するか → 代用する
const actions = {
  async fetch ({ commit }) {
      await axios.get('/api/images').then(res => {
          commit('setData', res.data);
      });
  },
  async delete ({state, commit}, post) {
      const index = state.posts.indexOf(post);

      return await axios.delete('/api/images/' + post.id)
          .then(res => {
              commit('delete', index);
              return true;
          }).catch(error => {
              return error;
          });
  },
  async store ({state, commit}, post) {
      return await axios.post('/api/images/', post)
          .then(res => {
              commit('add', res.data);
              return true;
          }).catch(error => {
              return error;
          });
  },
  async update ({state, commit}, newPost) {
      // stateからマッチしたpostを取り出す
      const post = state.posts.find((o) => {
          return o.id === newPost.id;
      });

      if (!post) {
          return false;
      }

      return await axios.patch('/api/images/' + newPost.id, newPost)
          .then(res => {
              commit('update', {post, newPost});
              return true;
          }).catch(error => {
              return error;
          });
  }
};

export default {
  namespaced: true,	// 名前空間を有効にする
  state,
  getters,
  mutations,
  actions
}