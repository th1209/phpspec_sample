* composer上で、PSR-4対応のオートロード設定をする。
  * composer.json上で、以下のように記載
  ```
  "autoload": {
      "psr-4": {
          "SampleProject\\": "src/"
      }
  }
  ```
  * `composer dump-autoload`コマンドで設定を反映
  * 参考
    * [Qiita Composerに自分の作ったクラスを追加してみる](http://qiita.com/ukisoft/items/d89f5f30290556e9f7e6)

* テストスケルトンの作成は、以下のようにする(名前空間/(...)/クラス名の形式)
  `vendor/bin/phpspec describe SampleProject/Hoge/Foo`

* 特定ディレクトリや特定クラスのテストだけ行いたい場合、以下のようにする。
  * まとめて実行
    `vendor/bin/phpspec run`
  * 特定クラスだけ実行
    `vendor/bin/phpspec run spec/Hoge/FooSpec.php`
  * 特定ディレクトリ以下のテストだけ実行
    `vendor/bin/phpspec run spec/Hoge`
  * 参考
    * [phpspec公式 Runngin phpspec](http://www.phpspec.net/en/stable/cookbook/console.html)  

* PSR-4に対応させるには?
  * 次のような`phpspec.yml`という名称のファイルを、プロジェクト直下に作る。
  * ファイルの中身は以下のように記載。
  ```
  suites:                             
      data_mediator_suite:            # 1つ以上のsuiteを記載。名称は何でも良いようだ。
          namespace: SampleProject\    # 名前空間(複数suiteを記載した場合 namespaceキーを使ってsuiteのマッチが行われる模様。)
          psr4_prefix: SampleProject\  # PSR-4での名前空間
          #spec_path: spec            # 各テストファイルの既定パス。デフォルト値はspec。
          #src_path: src              # ソースの基底パス。デフォルト値はsrc。
  ```
  * 参考
    * [phpspec公式 Configration](http://www.phpspec.net/en/stable/cookbook/configuration.html)


  [Test Your Trait With PHP Spec](http://blog.mitchellvanw.io/test-your-trait-with-php-spec)
