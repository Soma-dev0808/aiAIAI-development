# docker-laravel

## セットアップ

### 1. Clone Project

レポシトリーをCloneしてください。

```
git clone https://github.com/Soma-dev0808/aiAIAI-development.git

cd aiAIAI-development
```

### 2. Build Project

Docker image を元にビルドします。

設定内容は全てdocker-compose.ymlファイルに書かれています。

```
docker-compose up -d --build
```

### 3. Install Laravel

Docker appコンテナ内に入り、その中でLaravelをインストールします
*ここから先はコンテナ内での作業になります。何か不具合が見つかり、コンテナ外へ出る際はexitとコマンド入力してください。

```
docker-compose exec app bash

composer install
```

### 4. create .env file

必要な環境変数は全て.envに書かれているため、サンプルからコピーします。

```
cp .env.example .env
```

### 5. Generate APP_KEY

サンプルの.envにはAPP_KEYが記載されていないため、APP_KEYを作成します。

```
php artisan key:generate
```

### 6. Migrate DB schema

マイグレーションを行います。

```
php artisan migrate
```

### 7. Check if it's working correctly

exitでコンテナ外へ出た後、http://127.0.0.1:10080 をチェックしてみてください。

```
exit
```

### 8. Stop containers

PCを切る前や新しくコンテナを追加した際には、一度コンテナをストップする必要があります。

```
docker-compose down
```

新しくコンテナを追加した際、コンテナをストップした後にビルドし直す必要があります。

```
docker-compose build
```

再度コンテナを起動する際は以下のコマンドを入力してください。

```
docker-compose up -d
```

### 9. Before stop your PC

コンテナを停止した後、
PCを切る前にdocker自体を停止することも忘れないでください。
停止の仕方は使用しているDcokerによって異なります。
Windowsには二種類のDockerがあります（PCのスペックによってどっちをインストールするか変わります）
Docker for Windows ( Hyper-V)
Docker Toolbox

Toolboxを使用している場合は

```
docker-machine stop
```

で停止できます。

Docker for Windows ( Hyper-V)
Docker for Mac

の場合はGUIが用意されていますので、そちらから停止できます。
