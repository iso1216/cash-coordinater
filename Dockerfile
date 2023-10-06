# ベースイメージの指定
FROM node:14

# 作業ディレクトリの設定
WORKDIR /app

# アプリケーションの依存関係をインストール
COPY package*.json ./
RUN npm install

# アプリケーションのソースコードをコピー
COPY . .

# アプリケーションのビルド
RUN npm run build

# アプリケーションを起動
CMD [ "npm", "start" ]

# アプリケーションのポートをエクスポート
EXPOSE 3000
